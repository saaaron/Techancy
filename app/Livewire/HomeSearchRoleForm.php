<?php

namespace App\Livewire;

use App\Models\JobCategories;
use Livewire\Attributes\Computed;
use Livewire\Component;

class HomeSearchRoleForm extends Component
{
    public $role;

    #[Computed()] 
    public function roles() { // job role options
        return JobCategories::all();
    }

    function search_role() {
        $this->validate([
            'role' => 'required'
        ],[
            // validations
            'role.required' => 'Role is required',
        ]);

        // retrieve data from the request
        $role = $this->role;

        // redirect to the search page with the selected role
        return redirect()->route('search', ['s' => $role]);

    }

    public function render()
    {
        return view('livewire.home-search-role-form');
    }
}
