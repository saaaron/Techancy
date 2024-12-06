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

class PostAJobForm extends Component
{
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

    public function mount(){
        // user's currency
        $this->currency = User::where('id', auth()->user()->id)->value('currency');        
    }

    function post_job() {
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

        // retrieve data from the request
        $role = $this->role;
        $level = $this->level;
        $description = $this->description;
        $type = $this->type;
        $applicants = $this->applicants;
        $payment = $this->payment;
        $payment_day = $this->payment_day;

        // user id
        $user_id = auth()->user()->id;

        // unique id
        do {
            $id = str()->random(5); // id
        } while (JobPosts::where('unique_id', $id)->exists()); // if id exist, regenerate

        // insert job post info into db
        $jobPost = JobPosts::create([
            'unique_id' => $id,
            'by_user' => $user_id,
            'role' => $role,
            'level' => $level,
            'description' => $description,
            'type' => $type,
            'applicants' => $applicants,
            'payment' => $payment,
            'payment_day' => $payment_day,
            'created_at' => NOW()
        ]);

        // reset form
        $this->reset(['role','level','description','type','applicants','payment','payment_day']);

        // success msg
        request()->session()->flash("success", "Job post created successfully!");
    }

    public function render()
    {
        return view('livewire.post-a-job-form');
    }
}
