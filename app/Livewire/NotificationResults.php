<?php

namespace App\Livewire;

use App\Models\userNotifications;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NotificationResults extends Component
{
    public function notifications() {
        // see all notifications
        userNotifications::where('for_user', auth()->user()->id)->update([
            'seen' => 'yes'
        ]);
    }

    public function render()
    {
        // show notifications
        $notificationResults = DB::table('user_notifications')
                            ->leftJoin('job_post_applicants', 'user_notifications.unique_id', '=', 'job_post_applicants.for_notification')
                            ->leftJoin('job_posts', 'user_notifications.for_job_post', '=', 'job_posts.unique_id')
                            ->select(
                                'user_notifications.*',
                                'job_post_applicants.name as user_name',
                                'job_posts.role as role'
                            )
                            ->where('user_notifications.for_user', auth()->user()->id)
                            ->orderBy('user_notifications.created_at','desc')
                            ->limit(10)
                            ->get()
                            ->map(function ($notificationResult) {
                                $notificationResult->created_at = Carbon::parse($notificationResult->created_at); // Cast to Carbon
                                return $notificationResult;
                            });
        
        $totalRecordsCount = $notificationResults->count();
        
        // Define job post roles
        $notificationResultRole = null; // Default value

        if ($notificationResults->isNotEmpty() && $notificationResults->first()->role) {
            switch ($notificationResults->first()->role) {
                case "ai":
                    $notificationResultRole = "Artificial Intelligence";
                    break;
                case "backend_dev":
                    $notificationResultRole = "Back-End Development";
                    break;
                case "blockchain_dev":
                    $notificationResultRole = "Blockchain Development";
                    break;
                case "cloud_comp":
                    $notificationResultRole = "Cloud Computing";
                    break;
                case "cyber_sec":
                    $notificationResultRole = "Cybersecurity";
                    break;
                case "data_sci_n_analytics":
                    $notificationResultRole = "Data Science & Analytics";
                    break;
                case "devops_n_sre":
                    $notificationResultRole = "DevOps & SRE";
                    break;
                case "frontend_dev":
                    $notificationResultRole = "Front-End Development";
                    break;
                case "fullstack_dev":
                    $notificationResultRole = "Full-Stack Development";
                    break;
                case "game_dev":
                    $notificationResultRole = "Game Development";
                    break;
                case "it_support_n_helpd":
                    $notificationResultRole = "IT Support & Helpdesk";
                    break;
                case "mac_learning_engr":
                    $notificationResultRole = "Machine Learning Engineering";
                    break;
                case "mobile_app_dev":
                    $notificationResultRole = "Mobile App Development";
                    break;
                case "net_engr":
                    $notificationResultRole = "Network Engineering";
                    break;
                case "prod_mgt":
                    $notificationResultRole = "Product Management";
                    break;
                case "qa_test_n_auto":
                    $notificationResultRole = "QA Testing & Automation";
                    break;
                case "software_engr":
                    $notificationResultRole = "Software Engineering";
                    break;
                case "systems_admin":
                    $notificationResultRole = "Systems Administration";
                    break;
                case "uiux_design":
                    $notificationResultRole = "UI/UX Design";
                    break;
                case "web_dev":
                    $notificationResultRole = "Web Development";
                    break;
            }
        }
        
        return view('livewire.notificationResults', [
            'notificationResults' => $notificationResults,
            'totalRecordsCount' => $totalRecordsCount,
            'notificationResultRole' => $notificationResultRole,
        ]);
    }
}
