<?php

namespace App\Http\Controllers;

use App\Models\aboutPage;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about_us() {
        $about_us = aboutPage::get();

        return view('pages/about', ['about_us' => $about_us]);
    }
}
