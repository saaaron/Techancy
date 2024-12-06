<?php

namespace App\Livewire;

use App\Models\jobPostApplicants;
use App\Models\JobPosts;
use App\Models\userNotifications;
use Livewire\Component;
use Livewire\WithFileUploads;

class JobPostApplyNowForm extends Component
{
    use WithFileUploads;

    public $job_post_id;
    public $by_user_id;
    public $by_user_name;
    public $name;
    public $email;
    public $resume;
    public $cover_letter;
    
    public function job_post_apply_now() {
        $this->validate([
            'name' => 'required|min:2|max:20|regex:/^[a-zA-Z][a-zA-Z0-9\s]*$/u',
            'email' => 'required|email',
            'resume' => 'required|nullable|sometimes|min:10|max:2097152|mimes:docx,pdf',
            'cover_letter' => 'required|min:200|max:1500'
        ],[
            // name validations
            'name.required' => 'Name is required',
            'name.min' => 'Name is too short',
            'name.max' => 'Name is too long', 
            'name.regex' => 'Only letters, numbers, and spaces are allowed',

            // email validations
            'email.required' => 'Email address is required',
            'email.email' => 'Email address is invalid',

            // resume validations
            'resume.required' => 'Resume is required',
            'resume.max' => 'Resume must be less than 2MB',
            'resume.mimes'=> 'Only docx and pdf are allowed',

            // cover letter validations
            'cover_letter.required' => 'Cover letter is required',
            'cover_letter.min' => 'Cover letter must has a minimum of 500 characters',
            'cover_letter.max' => 'Cover letter must be less than 1,500 characters'
        ]);

        // check if applicant already applied
        $alreadyApplied = jobPostApplicants::where('for_job_post', $this->job_post_id)->where('email', $this->email)->get();
        $alreadyAppliedCount = $alreadyApplied->count();

        if ($alreadyAppliedCount == 1) {
            // already applied msg
            request()->session()->flash("closed", "A Job applicatiton was found with the email address <b>".$this->email."</b>");
        } else {
            // select job post applicants and applicants applied with job post id
            $jobPostApplicants = JobPosts::where('unique_id', $this->job_post_id)->value('applicants');
            $jobPostApplicantsApplied = JobPosts::where('unique_id', $this->job_post_id)->value('applicants_applied');
            
            // check if applicants applied is up to max applicants
            if ($jobPostApplicantsApplied == $jobPostApplicants) {
                // closed msg
                request()->session()->flash("closed", "Job post has reached the expected number of applicants");
            } else {

                // unique id
                do {
                    $id = str()->random(5); // id
                } while (jobPostApplicants::where('for_notification', $id)->exists()); // if id exist, regenerate

                // Process the resume file name
                $nameWithoutSpaces = str_replace(' ', '', ucwords($this->name));
                $resumeFileName = $nameWithoutSpaces . '('.$this->email.')_Resume_' . $this->job_post_id  .'.' . $this->resume->getClientOriginalExtension();

                // Save the file with the custom name
                $resumePath = $this->resume->storeAs('resumes', $resumeFileName, 'public');

                // insert into db
                jobPostApplicants::create([
                    'for_notification' => $id,
                    'for_job_post' => $this->job_post_id,
                    'for_user' => $this->by_user_id,
                    'name' => ucwords($this->name),
                    'email' => $this->email,
                    'resume' => $resumePath,
                    'cover_letter' => $this->cover_letter
                ]);

                // user notifications
                userNotifications::create([
                    'unique_id' => $id,
                    'for_job_post' => $this->job_post_id,
                    'for_user' => $this->by_user_id,
                    'type' => 'applicant',
                    'created_at' => NOW()
                ]);

                // increment job_posts `applicants` column
                JobPosts::where('unique_id', $this->job_post_id)->increment('applicants_applied');

                // reset form
                $this->reset(['name','email','resume','cover_letter']);

                // success msg
                request()->session()->flash("success", "Job application has been submitted successfully!");
            }
        }
    }

    public function render()
    {
        return view('livewire.job-post-apply-now-form');
    }
}
