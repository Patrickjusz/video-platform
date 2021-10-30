<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\View;
use Exception;

class VideoViews
{
    /**
     * Incremet video views
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Video $video
     * @return bool
     */
    public static function increment(Request $request, Video $video): bool
    {
        $view = new View(['ip' => $request->ip()]);
        $result = false;

        try {
            $result = (bool)$video->views()->save($view);
        } catch (Exception $ex) {
            //duplicate 
        }

        return $result;
    }
}
