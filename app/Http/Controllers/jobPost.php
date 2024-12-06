<?php

namespace App\Http\Controllers;

use App\Models\JobPosts;
use App\Models\jobPostViews;
use App\Models\userNotifications;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jobPost extends Controller
{
    public function job_post(Request $request, $id) {
        $jobPostQuery = DB::table('job_posts')
                    ->join('users', 'job_posts.by_user', '=', 'users.id')
                    ->select(
                        'job_posts.*',
                        'users.profile_photo as user_image',
                        'users.name as user_name',
                        'users.currency as user_currency',
                        'users.location as user_location'
                    )
                    ->where('job_posts.unique_id', $id)
                    ->orderBy('job_posts.created_at','desc')
                    ->limit(3)
                    ->get()
                    ->map(function ($jobPost) {
                        $jobPost->created_at = Carbon::parse($jobPost->created_at); // Cast to Carbon
                        return $jobPost;
                    });
        
        $totalRecordsCount = $jobPostQuery->count();

        // define $jobPostQuery->first()->role slug
        if ($jobPostQuery->first()->role == "ai") {
            $role = 'Artificial Intelligence';
        } elseif ($jobPostQuery->first()->role == "backend_dev") { 
            $role = 'Back-End Development';
        } elseif ($jobPostQuery->first()->role == "blockchain_dev") {
            $role = 'Blockchain Development';
        } elseif ($jobPostQuery->first()->role == "cloud_comp") {
            $role = 'Cloud Computing';
        } elseif ($jobPostQuery->first()->role == "cyber_sec") {
            $role = 'Cybersecurity';
        } elseif ($jobPostQuery->first()->role == "data_sci_n_analytics") {
            $role = 'Data Science & Analytics';
        } elseif ($jobPostQuery->first()->role == "devops_n_sre") {
            $role = 'DevOps & Site Reliability Engineering (SRE)';
        } elseif ($jobPostQuery->first()->role == "frontend_dev") {
            $role = 'Front-End Development';
        } elseif ($jobPostQuery->first()->role == "fullstack_dev") {
            $role = 'Full-Stack Development';
        } elseif ($jobPostQuery->first()->role == "game_dev") {
            $role = 'Game Development';
        } elseif ($jobPostQuery->first()->role == "it_support_n_helpd") {
            $role = 'IT Support & Helpdesk';
        } elseif ($jobPostQuery->first()->role == "mac_learning_engr") {
            $role = 'Machine Learning Engineering';
        } elseif ($jobPostQuery->first()->role == "mobile_app_dev") {
            $role = 'Mobile App Development';
        } elseif ($jobPostQuery->first()->role == "net_engr") {
            $role = 'Network Engineering';
        } elseif ($jobPostQuery->first()->role == "prod_mgt") {
            $role = 'Product Management';
        } elseif ($jobPostQuery->first()->role == "qa_test_n_auto") {
            $role = 'QA Testing & Automation';
        } elseif ($jobPostQuery->first()->role == "software_engr") {
            $role = 'Software Engineering';
        } elseif ($jobPostQuery->first()->role == "systems_admin") {
            $role = 'Systems Administration';
        } elseif ($jobPostQuery->first()->role == "uiux_design") {
            $role = 'UI/UX Design';
        } elseif ($jobPostQuery->first()->role == "web_dev") {
            $role = 'Web Development';
        }

        // Extract the first record (if it exists)
        $title = $totalRecordsCount > 0 
        ? $jobPostQuery->first()->user_name . "'s " . $role . " job post on ".env('APP_NAME')
        : 'Job post not found';

        // job post viewed (add views to db table and user notifications)
        $viewer_ip = $request->ip(); // viewer's ip address

        // check if ip address exist for job post id
        $ipExist = jobPostViews::where('for_job_post', $id)->where('ip_address', $viewer_ip)->get();
        $ipRecordCount = $ipExist->count();

        if ($ipRecordCount == 0) {
            // unique id
            do {
                $u_id = str()->random(5); // id
            } while (userNotifications::where('unique_id', $u_id)->exists()); // if id exist, regenerate

            // insert into db (and user notifications)
            jobPostViews::create([
                'for_job_post' => $id,
                'for_user' => $jobPostQuery->first()->by_user,
                'ip_address' => $viewer_ip,
                'created_at' => now()
            ]);

            // user notifications
            userNotifications::create([
                'unique_id' => $u_id,
                'for_job_post' => $id,
                'for_user' => $jobPostQuery->first()->by_user,
                'type' => 'view',
                'created_at' => NOW()
            ]);

            // increment job_post `views` column
            JobPosts::where('unique_id', $id)->increment('views');
        }

        return view('job', [
            'jobPostQuery' => $jobPostQuery,
            'totalRecordsCount' => $totalRecordsCount,
            'title' => $title
        ]);
    }
}
