<?php

namespace App\Http\Controllers;

use App\Models\JobPosts;
use Illuminate\Http\Request;

class jobLevelStats extends Controller
{
    function jobLevelStats() {
        // job levels
        $intern = "intern";
        $entry = "entry";
        $mid = "mid";
        $senior = "senior";

        $internStats = JobPosts::where('level', $intern)->get();
        $internStatsCount = $internStats->count();

        $entryStats = JobPosts::where('level', $entry)->get();
        $entryStatsCount = $entryStats->count();

        $midStats = JobPosts::where('level', $mid)->get();
        $midStatsCount = $midStats->count();

        $seniorStats = JobPosts::where('level', $senior)->get();
        $seniorStatsCount = $seniorStats->count();

        return view('home', [
            'internStatsCount' => $internStatsCount,
            'entryStatsCount' => $entryStatsCount,
            'midStatsCount' => $midStatsCount,
            'seniorStatsCount' => $seniorStatsCount
        ]);
    }
}
