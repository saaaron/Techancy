<?php

namespace App\Http\Controllers;

use App\Models\jobPostApplicants;
use App\Models\JobPosts;
use App\Models\jobPostViews;
use App\Models\userNotifications;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    
    public function dashboard() {
        if(Auth::check()) {
            // total job posts
            $totalJobPosts = JobPosts::where('by_user', auth()->user()->id)->count();

            // total job post applicants
            $totalApplicants = jobPostApplicants::where('for_user', auth()->user()->id)->count();

            return view('dashboard', [
                'totalJobPosts' => $totalJobPosts,
                'totalApplicants' => $totalApplicants
            ]);
        }
  
        return redirect("login")->with('must_login', '<b>Ops!</b> You need to login first');
    }

    public function logout_user(): RedirectResponse {
        cookie()->queue(cookie()->forget('keep_me_logged_in')); // kill cookie
        Session::flush();
        Auth::logout();
  
        return redirect()->route('login')->with('logout_msg', 'You have been logged out successfully!');
    }

    public function total_jobs() {
        $total_jobs = JobPosts::where('by_user', auth()->user()->id)->count();

        return view('jobs', ['totalJobPosts' => $total_jobs]);
    }

    public function job_post($id) {
        $jobPost = JobPosts::where('unique_id', $id)->get();

        $title = 'Job post ['.$id.']'; // page title

        return view('job_post', [
            'jobPost' => $jobPost,
            'title' => $title
        ]);
    }

    public function select_edit_job_post($id) {
        $jobPost = JobPosts::where('unique_id', $id)->value('unique_id');

        $title = 'Edit job post ['.$id.']';

        return view('edit_job_post', [
            'unique_id' => $jobPost,
            'title' => $title
        ]);
    }

    public function delete_job_post($id) {
        // delete job post, notifications, applicants & views
        JobPosts::where('unique_id', $id)->delete();
        jobPostApplicants::where('for_job_post', $id)->delete();
        jobPostViews::where('for_job_post', $id)->delete();
        userNotifications::where('for_job_post', $id)->delete();

        return redirect("d/jobs")->with('delete_msg', 'Job post deleted successfully!');
    }
}
