<?php

namespace App\Livewire;

use App\Models\termsOfUsePage;
use League\CommonMark\CommonMarkConverter;
use Livewire\Component;

class TermsOfUse extends Component
{
    public function render()
    {
        $terms_of_use_data = termsOfUsePage::get();
        $converter = new CommonMarkConverter();

        // Parse Markdown to HTML
        $terms_of_use = $terms_of_use_data->map(function ($item) use ($converter) {
            $item->terms_of_use = $converter->convertToHtml($item->terms_of_use);
            return $item;
        });

        return view('livewire.terms-of-use', ['terms_of_use' => $terms_of_use]);
    }
}
