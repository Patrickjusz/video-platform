<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Services\VideoViews;

class VideoController extends Controller
{
    /**
     * Show single video subpage
     *
     * @param  string  $slug
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index($slug, Request $request)
    {
        if (!empty($slug)) {
            $video = Video::getVisibleVideoBySlug($slug);

            if ($video) {
                VideoViews::increment($request, $video);
                return view('video', ['video' => $video, 'menu' => getNavigationElements()]);
            }
        }

        abort(404);
    }
}
