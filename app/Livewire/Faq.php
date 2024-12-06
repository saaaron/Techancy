<?php

namespace App\Livewire;

use App\Models\faqPage;
use League\CommonMark\CommonMarkConverter;
use Livewire\Component;

class Faq extends Component
{
    public function render()
    {
        $faq_data = faqPage::get();
        $converter = new CommonMarkConverter();

        // Parse Markdown to HTML
        $faq = $faq_data->map(function ($item) use ($converter) {
            $item->faq_html = $converter->convertToHtml($item->answer);
            return $item;
        });

        return view('livewire.faq', [
            'faqs' => $faq
        ]);
    }
}
