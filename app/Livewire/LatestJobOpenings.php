<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LatestJobOpenings extends Component
{
    public function render()
    {
        $latestJobOpenings = DB::table('job_posts')
                            ->join('users', 'job_posts.by_user', '=', 'users.id')
                            ->select(
                                'job_posts.*',
                                'users.profile_photo as user_image',
                                'users.name as user_name',
                                'users.currency as user_currency',
                                'users.location as user_location'
                            )
                            ->where('applicants_applied', 0)
                            ->orderBy('job_posts.created_at','desc')
                            ->limit(3)
                            ->get()
                            ->map(function ($latestJobOpening) {
                                $latestJobOpening->created_at = Carbon::parse($latestJobOpening->created_at); // Cast to Carbon
                                return $latestJobOpening;
                            });
        $totalRecordsCount = $latestJobOpenings->count();

        return view('livewire.latest-job-openings', [
            'latestJobOpenings' => $latestJobOpenings,
            'totalRecordsCount' => $totalRecordsCount
        ]);
    }
}
