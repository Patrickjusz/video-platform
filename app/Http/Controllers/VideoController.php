<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index($slug)
    {
        if (!empty($slug)) {
            $video = Video::where('state', 'active')->where('slug', $slug)->limit(1)->get();
            if ($video->isNotEmpty()) {
                return view('video', ['video' => $video]);
            }
        }

        abort(404);
    }
}
