<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class YouTubeApi
{
    private $entryUrl = 'https://www.googleapis.com/youtube/v3/search';
    private $maxResults = 50;
    private $apiKey;
    private $channelId;

    public function __construct(string $apiKey, string $channelId = '')
    {
        $this->apiKey = $apiKey;
        $this->channelId = $channelId;
    }

    /**
     * setChannelId
     *
     * @param  string $channelId
     * @return void
     */
    public function setChannelId(string $channelId): void
    {
        $this->channelId = $channelId;
    }

    /**
     * getVideos
     *
     * @return array
     */
    public function getVideos(): array
    {
        $videos = Cache::remember("{$this->apiKey}_{$this->channelId}_get_videos", 3600, function () {
            $nextPageToken = false;
            $baseUrl = "{$this->entryUrl}?key={$this->apiKey}&channelId={$this->channelId}&part=snippet,id&order=date&maxResults={$this->maxResults}";
            $videos = [];

            do {
                $url = $baseUrl;

                if ($nextPageToken) {
                    $url .= '&pageToken=' . $nextPageToken;
                }

                $response = Http::get($url);
                $responseJson = $response->json();
                $videos = $responseJson['items'] ? array_merge($videos, $responseJson['items']) : $videos;

                $nextPageToken = $responseJson['nextPageToken'] ?? false;
            } while ($nextPageToken);

            return $videos;
        });

        // https://img.youtube.com/vi/QBRRL-Tz6eE/maxresdefault.jpg
        // https://i1.ytimg.com/vi/QBRRL-Tz6eE/maxresdefault.jpg

        return $videos;
    }
}
