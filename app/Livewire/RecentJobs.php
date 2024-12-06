<?php

namespace App\Livewire;

use App\Models\JobPosts;
use Livewire\Component;

class RecentJobs extends Component
{
    public function render()
    {
        $user_id = auth()->user()->id;
        $recentJobs = JobPosts::where('by_user',$user_id)
                                ->orderBy('created_at','desc')
                                ->limit(3)
                                ->get();
        $totalRecordsCount = $recentJobs->count(); // get total record count

        return view('livewire.recent-jobs', [
            'totalRecordsCount' => $totalRecordsCount,
            'recentJobs' => $recentJobs
        ]);
    }
}
