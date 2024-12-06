<?php

namespace App\Livewire;

use App\Models\userNotifications;
use Livewire\Component;

class NotificationCount extends Component
{
    public function render()
    {
        $notification = userNotifications::select('seen')
                                        ->where('seen', 'no')
                                        ->where('for_user', auth()->user()->id)->get();
        
        if ($notification->count() == 0) {
            $totalRecordsCount = "";
        } else {
            $totalRecordsCount = "<div class='badge bg-danger'>".$notification->count()."</div>";
        }

        return view('livewire.notification-count', [
            'totalRecordsCount' => $totalRecordsCount
        ]);
    }
}
