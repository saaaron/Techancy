<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Livewire\Component;

class EditProfileForm extends Component
{
    public $name;
    public $bio;
    public $website;
    public $location;

    public function mount(){
        // Load the authenticated user's profile data
        $this->name = auth()->user()->name;
        $this->bio = auth()->user()->bio;
        $this->website = auth()->user()->website;
        $this->location = auth()->user()->location;
    }

    function edit_profile() {
        $this->validate([
            'name' => 'required|min:2|max:20|regex:/^[a-zA-Z][a-zA-Z0-9\s]*$/u',
            'bio' => 'required',
            'website' => 'required',
            'location' => 'required'
        ],[
            // validations
            'name.required' => 'Name is required',
            'name.min' => 'Name is too short',
            'name.max' => 'Name is too long', 
            'name.regex' => 'Only letters, numbers, and spaces are allowed',

            'bio.required' => 'Bio is required',
            'website.required' => 'Website is required',
            'location.required' => 'Location is required'
        ]);

        // retrieve data from the request
        $name = ucwords($this->name);
        $bio = $this->bio;
        $website = $this->website;
        $location = $this->location;

        // user id
        $user_id = auth()->user()->id;

        if ($name == auth()->user()->name && $bio == auth()->user()->bio && $website == auth()->user()->website && $location == auth()->user()->location) {
            // no changes made
            request()->session()->flash("no_changes", "No changes were made!");
        } else {
            // update user info
            User::where('id', $user_id)->update([
                'name' => $name,
                'bio' => $bio,
                'website' => $website,
                'location' => $location
            ]);

            // success msg
            request()->session()->flash("success", "Profile updated successfully!");
        }
    }

    public function render()
    {
        return view('livewire.edit-profile-form');
    }
}
