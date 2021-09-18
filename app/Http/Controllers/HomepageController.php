<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Cache;

class HomepageController extends Controller
{
    private $cacheTime = 0;

    public function index()
    {
        $videos = Cache::remember('homepage_index', $this->cacheTime, function () {
            return Video::where('state', 'active')
                ->where('slug', '!=', '')
                ->where('filename', '!=', '')
                ->where('thumb', '!=', '')
                ->orderByDesc('created_at')
                ->get();
        });


        return view('homepage', ['videos' => $videos, 'latest_video' => $videos[0] ?? []]);
    }


    public function popular()
    {
        $videos = Cache::remember('homepage_popular', $this->cacheTime, function () {
            return Video::where('state', 'active')
                ->where('slug', '!=', '')
                ->where('filename', '!=', '')
                ->where('thumb', '!=', '')
                ->orderByDesc('views_cache')
                ->get();
        });

        $latestVideo  = Cache::remember('homepage_popular_latest_video', $this->cacheTime, function () {
            return Video::where('state', 'active')->latest()->first();
        });

        return view('homepage', ['videos' => $videos, 'latest_video' => $latestVideo]);
    }
}
