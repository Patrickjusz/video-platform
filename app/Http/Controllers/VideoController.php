<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Tag;

class VideoController extends Controller
{
    public function index($slug)
    {
        if (!empty($slug)) {
            $video = Video::where('state', 'active')->where('slug', $slug)->first();

            if ($video) {
                return view('video', ['video' => $video]);
            }
        }

        abort(404);
    }
}
