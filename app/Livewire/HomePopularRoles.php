<?php

namespace App\Livewire;

use App\Models\JobPosts;
use Livewire\Component;

class HomePopularRoles extends Component
{
    public function render()
    {
        // select most frequently used roles
        $popularRoles = JobPosts::select('role')
                        ->selectRaw('COUNT(*) as count')
                        ->groupBy('role')
                        ->orderBy('count', 'desc')
                        ->limit(3)
                        ->get();
        $totalRecordsCount = $popularRoles->count();

        return view('livewire.home-popular-roles', [
            'popularRoles' => $popularRoles,
            'totalRecordsCount' => $totalRecordsCount
        ]);
    }
}
