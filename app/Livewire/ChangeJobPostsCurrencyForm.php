<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ChangeJobPostsCurrencyForm extends Component
{
    public $currency;

    public function mount($currency){
        // Load the authenticated user's profile data
        $this->currency = $currency;
    }

    public function changeJobPostsCurrency() {
        // Validate incoming request data
        $this->validate([
            'currency' => 'required',
        ],[
            // currency validations
            'currency.required' => "Currency is required"
        ]);

        // retrieve data from the request
        $currency = $this->currency;

        // user id
        $user_id = auth()->user()->id;

        if ($currency == auth()->user()->currency) {
            // No changes made
            request()->session()->flash("no_changes", "No changes made!");
        } else {
            // update user info
            User::where('id', $user_id)->update([
                'currency' => $currency
            ]);

            // success msg
            request()->session()->flash("success", "Currency changed successfully!");
        }
    }

    public function render()
    {
        return view('livewire.change-job-posts-currency-form');
    }
}
