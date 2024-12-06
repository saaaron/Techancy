<?php

namespace App\Livewire;

use App\Models\jobPostApplicants as ModelsJobPostApplicants;
use Livewire\Component;
use Livewire\WithPagination;

class JobPostApplicants extends Component
{
    use WithPagination;

    public $job_post_id;

    public function render()
    {
        // get job post applicants
        $jobPostApplicants = ModelsJobPostApplicants::where('for_job_post', $this->job_post_id)
                            ->orderBy('created_at','desc')
                            ->paginate(10);
        $totalRecordsCount = $jobPostApplicants->count(); // total records count

        return view('livewire.job-post-applicants', [
            'jobPostApplicants' => $jobPostApplicants,
            'totalRecordsCount' => $totalRecordsCount
        ]);
    }
}
