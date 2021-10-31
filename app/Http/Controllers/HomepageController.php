<?php

namespace App\Http\Controllers;

use App\Models\Video;

class HomepageController extends Controller
{
    use \App\Traits\MiddlewareToolsTrait;
    
    /**
     * Show homepage
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::getVideosByState('public', 'created_at', true);

        return view('homepage', ['videos' => $videos, 'latest_video' => $videos[0] ?? [], 'menu' => getNavigationElements()]);
    }

    /**
     * Show popular videos subpage
     * 
     * @return \Illuminate\Http\Response
     */
    public function popular()
    {
        $videos = Video::getVideosByState('public', 'views_cache', true);
        $latestVideo  = Video::getVideosByState('public', 'created_at', true, 1)[0] ?? [];

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
