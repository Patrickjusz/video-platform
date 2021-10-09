<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\View;
use Exception;

class VideoController extends Controller
{
    public function index($slug, Request $request)
    {
        if (!empty($slug)) {
            $video = Video::where(function ($query) {
                return $query->where('state', 'public')
                    ->orWhere('state', 'not_public');
            })->where('slug', $slug)->first();

            if ($video) {
                $view = new View(['ip' => $request->ip()]);

                try {
                    $video->views()->save($view);
                } catch (Exception $ex) {
                    //duplicate 
                }

                return view('video', ['video' => $video, 'menu' => getNavigationElements()]);
            }
        }

        abort(404);
    }
}
