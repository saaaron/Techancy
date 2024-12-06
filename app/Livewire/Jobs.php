<?php

namespace App\Livewire;

use App\Models\JobPosts;
use Livewire\Component;
use Livewire\WithPagination;

class Jobs extends Component
{
    use WithPagination;

    public function render()
    {
        $user_id = auth()->user()->id;
        $jobs = JobPosts::where('by_user',$user_id)
                                ->orderBy('created_at','desc')
                                ->paginate(6);
        $totalRecordsCount = $jobs->count(); // get total record count

        return view('livewire.jobs', [
            'totalRecordsCount' => $totalRecordsCount,
            'jobs' => $jobs
        ]);
    }
}
