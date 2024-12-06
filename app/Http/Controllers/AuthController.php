<?php

namespace App\Http\Controllers;

use App\Events\EmailVerify;
use App\Models\DeleteAcctTokens;
use App\Models\EmailResetTokens;
use App\Models\EmailVerifyTokens;
use App\Models\jobPostApplicants;
use App\Models\JobPosts;
use App\Models\jobPostViews;
use App\Models\PasswordResetTokens;
use App\Models\User;
use App\Models\userNotifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // select email verification token info
    public function select_token_info($token) {
        $records = EmailVerifyTokens::where('token', $token)->get();
        $totalRecordsCount = $records->count(); // get total record count
        return view('email_verify', ['records' => $records, 'totalRecordsCount' => $totalRecordsCount]);
    }

    // verify user email address
    public function verify_user_email($token) {
        // retrieve the user id with email (select email with token, token with id)
        $email = EmailVerifyTokens::where('token', $token)->value('email');
        $user_id = User::where('email', $email)->value('id');

        // variables
        $yes = 'yes';

        // update user verified
        User::where('id', $user_id)->update([
            'email_verified' => $yes,
            'email_verified_at' => NOW()
        ]);

        // delete email verification token
        EmailVerifyTokens::where('email', $email)->delete();

        // return back to login page
        return redirect("login")->with('verify_msg', 'Email verification was successful! You can now login');
    }

    // select forgot password token info
    public function select_fptoken_info($token) {
        $records = PasswordResetTokens::where('token', $token)->get();
        $totalRecordsCount = $records->count(); // get total record count
        return view('reset_password', ['records' => $records, 'totalRecordsCount' => $totalRecordsCount]);
    }

    // reset user password
    public function reset_user_password(Request $request, $token) {
        // Validate incoming request data
        $request->validate([
            'password' => 'required|min:6|max:100',
        ],[
            // password validations
            'password.required' => "Password is required",
            'password.min' => "Password must be at least 6 characters",
            'password.max' => "Password is too long"
        ]);

        // Retrieve data from the request
        $newPassword = $request->input('password'); // password

        // Retrieve the user id from token (select email with token, token with id)
        $email = PasswordResetTokens::where('token', $token)->value('email');
        $user_id = User::where('email', $email)->value('id');

        // Retrieve the old password (hashed) from the database
        $oldPassword = User::where('id', $user_id)->value('password');

        if (Hash::check($newPassword, $oldPassword)) { // check if new password is same with old password
            // If no changes were made, return to the form with an error message
            return redirect()->back()->with(['reset_pass_msg' => 'Your new password must be different from your old password']);
        } else { // reset password
            // Hash the new password before saving
            $hashNewPassword = Hash::make($newPassword);

            // update user password
            User::where('id', $user_id)->update([
                'password' => $hashNewPassword
            ]);

            // delete password reset token
            PasswordResetTokens::where('email', $email)->delete();

            return redirect("login")->with('reset_pass_msg', 'Your password has been reset successfully! You can now login'); // return back to login page
        }
    }

    // select change email addr token info
    public function select_ceatoken_info($token) {
        $records = EmailResetTokens::where('token', $token)->get();
        $totalRecordsCount = $records->count(); // get total record count
        return view('change_email_addr', ['records' => $records, 'totalRecordsCount' => $totalRecordsCount]);
    }

    // change user email address
    public function change_email_addr(Request $request, $token) {
        // Validate incoming request data
        $request->validate([
            'email' => 'required|email|unique:users,email'
        ],[
            // email validations
            'email.required' => 'Email address is required',
            'email.email' => 'Email address is invalid',
            'email.unique' => '<b>'. $request->input('email').'</b> already in use',
        ]);

        // Retrieve data from the request
        $email = $request->input('email'); // new email

        // Retrieve the user info from token (select email with token, id with email, name with email)
        $oldEmail = EmailResetTokens::where('token', $token)->value('email');
        $user_id = User::where('email', $oldEmail)->value('id');
        $username = User::where('email', $oldEmail)->value('name');
       
            // generate new email verify token
            do {
                $token = str()->random(50); // token
            } while (EmailVerifyTokens::where('token', $token)->exists()); // if token exist, regenerate

            // update user email address and set email_verified to no
            User::where('id', $user_id)->update([
                'email' => $email,
                'email_verified' => "no"
            ]);

            // insert new email verification token into db
            $verifyToken = EmailVerifyTokens::create([
                'email' => $email,
                'token' => $token
            ]);

            // email verify event
            event(new EmailVerify($username, $email, $token));

            // delete email reset token
            EmailResetTokens::where('email', $oldEmail)->delete();

            return redirect("login")->with('reset_email_msg', 'Your email address has been changed successfully! You can now login'); // return back to login page
        
    }

    // select delete acct token info
    public function select_datoken_info($token) {
        $records = DeleteAcctTokens::where('token', $token)
        ->join('users', 'delete_acct_tokens.email', '=', 'users.email') // Join on the email field
        ->select('delete_acct_tokens.*', 'users.name as user_name', 'users.email as user_email') // Select user fields
        ->get();

        $totalRecordsCount = $records->count(); // get total record count
        
        return view('delete_acct', ['records' => $records, 'totalRecordsCount' => $totalRecordsCount]);
    }

    public function delete_acct($token) {
        // Retrieve the user info from token (select email with token, id with email)
        $email = DeleteAcctTokens::where('token', $token)->value('email');
        $user_id = User::where('email', $email)->value('id');
        
        // delete all user data from db
        // Retrieve all unique_ids for the user's job posts
        $jobPosts = JobPosts::where('by_user', $user_id)->pluck('unique_id');

        // Delete job post applicants for each unique_id
        jobPostApplicants::whereIn('for_job_post', $jobPosts)->delete();

        // Delete job post notifications
        userNotifications::where('for_user', $user_id)->delete();

        // Delete job post views
        jobPostViews::where('for_user', $user_id)->delete();

        // Delete job posts for the user
        JobPosts::where('by_user', $user_id)->delete();

        // Delete user information
        User::where('id', $user_id)->delete(); 

        // delete acct token
        DeleteAcctTokens::where('email', $email)->delete();

        Auth::logout(); // Log out the user

        return redirect("login")->with('delete_acct_msg', 'Your account and data with us has been deleted successfully!'); // return back to login page        
    }
}
