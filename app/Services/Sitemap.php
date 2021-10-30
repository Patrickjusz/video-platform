<?php

namespace App\Services;

use App\Models\Video;

class Sitemap
{
    /**
     * Generate sitemap.xml file
     *
     * @return void
     */
    public static function create(): void
    {
        $video = Video::where('state', 'public')->orderByDesc('created_at')->get();
        $latestVideo = Video::where('state', 'public')->latest()->first();
        $lastMod = ($latestVideo->created_at ?? $latestVideo->updated_at);

        $sitemap = \App::make("sitemap");
        $sitemap->add(env('APP_URL'), $lastMod, 1, 'daily');
        $sitemap->add(env('APP_URL') . '/popularne', $lastMod, 1, 'daily');

        foreach ($video as $video) {
            $videoUrl = env('APP_URL') . '/' . $video->slug;
            $lastMod = ($video->created_at ?? $video->updated_at);
            $sitemap->add($videoUrl, $lastMod, 1, 'monthly');
        }

        $sitemap->store('xml', 'sitemap');
    }
}
