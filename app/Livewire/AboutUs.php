<?php

namespace App\Livewire;

use App\Models\aboutPage;
use League\CommonMark\CommonMarkConverter;
use Livewire\Component;

class AboutUs extends Component
{
    public function render()
    {
        $about_us_data = aboutPage::get();
        $converter = new CommonMarkConverter();

        // Parse Markdown to HTML
        $about_us = $about_us_data->map(function ($item) use ($converter) {
            $item->about = $converter->convertToHtml($item->about);
            return $item;
        });

        return view('livewire.about-us', ['about_us' => $about_us]);
    }
}
