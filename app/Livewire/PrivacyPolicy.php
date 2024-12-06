<?php

namespace App\Livewire;

use App\Models\privacyPolicyPage;
use Carbon\Carbon;
use League\CommonMark\CommonMarkConverter;
use Livewire\Component;

class PrivacyPolicy extends Component
{
    public function render()
    {
        $privacy_policy_data = privacyPolicyPage::get();
        $converter = new CommonMarkConverter();

        // Parse Markdown to HTML
        $privacy_policy = $privacy_policy_data->map(function ($item) use ($converter) {
            $item->privacy_policy_html = $converter->convertToHtml($item->privacy_policy);
            return $item;
        });
        
        return view('livewire.privacy-policy', [
            'privacy_policy' => $privacy_policy
        ]);
    }
}
