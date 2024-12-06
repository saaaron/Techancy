<?php

namespace App\Livewire;

use App\Models\JobCategories;
use App\Models\JobLevels;
use App\Models\JobPaymentDays;
use App\Models\JobPosts;
use App\Models\JobTypes;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class EditJobPost extends Component
{
    public $job_post_id;
    public $role;
    public $level;
    public $description;
    public $type;
    public $applicants;
    public $payment;
    public $payment_day;
    public $currency;

    #[Computed()] 
    public function roles() { // job role options
        return JobCategories::all();
    }

    #[Computed()] 
    public function levels() { // job level options
        return JobLevels::all();
    }

    #[Computed()] 
    public function types() { // job type options
        return JobTypes::all();
    }

    #[Computed()] 
    public function paymentDays() { // job payment day options
        return JobPaymentDays::all();
    }

    public function mount($job_post_id){
        // Load job post info
        $this->job_post_id = $job_post_id;
        $this->role = JobPosts::where('unique_id', $job_post_id)->value('role');
        $this->level = JobPosts::where('unique_id', $job_post_id)->value('level');
        $this->description = JobPosts::where('unique_id', $job_post_id)->value('description');
        $this->type = JobPosts::where('unique_id', $job_post_id)->value('type');
        $this->applicants = JobPosts::where('unique_id', $job_post_id)->value('applicants');
        $this->payment = JobPosts::where('unique_id', $job_post_id)->value('payment');
        $this->payment_day = JobPosts::where('unique_id', $job_post_id)->value('payment_day');

        // user's currency
        $this->currency = User::where('id', auth()->user()->id)->value('currency');        
    }

    function edit_job_post() {
        $this->validate([
            'role' => 'required',
            'level' => 'required',
            'description' => 'required',
            'type' => 'required',
            'applicants' => 'required|regex:/^[0-9]*$/u|gt:0',
            'payment' => 'required|regex:/^[0-9]*$/u',
            'payment_day' => 'required'
        ],[
            // validations
            'role.required' => 'Role is required',
            'level.required' => 'Level is required',
            'description.required' => 'Description is required',
            'type.required' => 'Type is required',

            'applicants.required' => 'Applicants is required',
            'applicants.regex' => 'Only numbers are allowed',
            'applicants.gt' => 'Applicants must be greater than 0',

            'payment.required' => 'Payment is required',
            'payment.regex' => 'Only numbers are allowed',

            'payment_day.required' => 'Payment day is required'
        ]);

        // Retrieve the existing job post data from the database
        $existingJobPost = JobPosts::where('unique_id', $this->job_post_id)->first();

        // Check if any changes were made
        if (
            $existingJobPost->role === $this->role &&
            $existingJobPost->level === $this->level &&
            $existingJobPost->description === $this->description &&
            $existingJobPost->type === $this->type &&
            $existingJobPost->applicants == $this->applicants &&
            $existingJobPost->payment == $this->payment &&
            $existingJobPost->payment_day === $this->payment_day
        ) {
            // Flash no changes message
            request()->session()->flash("no_changes", "No changes were made!");
        } else {
            // retrieve data from the request
            $role = $this->role;
            $level = $this->level;
            $description = $this->description;
            $type = $this->type;
            $applicants = $this->applicants;
            $payment = $this->payment;
            $payment_day = $this->payment_day;

            // update jpb post info
            $jobPost = JobPosts::where('unique_id', $this->job_post_id)->update([
                'role' => $role,
                'level' => $level,
                'description' => $description,
                'type' => $type,
                'applicants' => $applicants,
                'payment' => $payment,
                'payment_day' => $payment_day,
                'updated_at' => NOW()
            ]);

            // success msg
            request()->session()->flash("success", "Job post editted successfully!");
        }
    }

    public function render()
    {
        return view('livewire.edit-job-post');
    }
}
