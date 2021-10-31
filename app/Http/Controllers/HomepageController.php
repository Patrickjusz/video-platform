<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Support\Facades\Cache;

class HomepageController extends Controller
{
    private $cacheTime = 7200;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    function __construct()
    {
        if (isDev()) {
            $cacheTime = 0;
        }
    }

    /**
     * Show homepage
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Cache::remember('homepage_index', $this->cacheTime, function () {
            return Video::getVideosByState('public', 'created_at', true);
        });

        return view('homepage', ['videos' => $videos, 'latest_video' => $videos[0] ?? [], 'menu' => getNavigationElements()]);
    }

    /**
     * Show popular videos subpage
     * 
     * @return \Illuminate\Http\Response
     */
    public function popular()
    {
        $videos = Cache::remember('homepage_popular', $this->cacheTime, function () {
            return Video::getVideosByState('public', 'views_cache', true);
        });

        $latestVideo  = Cache::remember('homepage_popular_latest_video', $this->cacheTime, function () {
            return Video::getVideosByState('public', 'created_at', true, 1)[0] ?? [];
        });

        return view('homepage', ['videos' => $videos, 'latest_video' => $latestVideo, 'menu' => getNavigationElements()]);
    }

    /**
     * Show videos from category
     * 
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function tag($slug)
    {
        $videos = Video::where('state', 'public')->with('tags')->whereHas('tags', function ($query)  use ($slug) {
            return $query->where('slug', '=', $slug);
        })->get();

        if ($videos->isEmpty()) {
            abort(404);
        } else {
            return view('homepage', ['videos' => $videos, 'latest_video' => $videos[0] ?? [], 'menu' => getNavigationElements(), 'title' => $slug]);
        }
    }
}
