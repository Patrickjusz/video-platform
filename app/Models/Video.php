<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use getID3;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'filename', 'thumb', 'views_cache', 'slug', 'state', 'description', 'created_at', 'seo_description', 'duration', 'seo_keywords', 'elapsed_time', 'views_cache_text'];

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }

    public function views()
    {
        return $this->hasMany('App\Models\View');
    }

    // TODO 
    public function getSimilarVideos(int $limit = 10)
    {
        return Video::inRandomOrder()->where('state', 'public')->limit($limit)->get();
    }

    private function getDetails(string $videoPath)
    {
        $getID3 = new getID3;
        $fileInfo = $getID3->analyze($videoPath);

        return $fileInfo;
    }

    public function getDuration()
    {
        return ($this->getDetails('storage/' . $this->filename)['playtime_string']) ?? '';
    }

    /**
     * Selectbox in edit video
     */
    public function getTagsListAttribute()
    {
        return $this->tags->pluck('id')->all();
    }

    /**
     * Get public or not_public video model by slug
     * 
     * @param  string $slug
     * @return \App\Models\Video;
     */
    public static function getVisibleVideoBySlug(string $slug): Video
    {
        return self::where(function ($query) {
            return $query->where('state', 'public')
                ->orWhere('state', 'not_public');
        })->where('slug', $slug)->first();
    }

    /**
     * Create new empty video in DB
     * 
     * @return \App\Models\Video;
     */
    public static function createEmpty(): Video
    {
        return self::create([
            'name' => '',
            'filename' => '',
            'thumb' => '',
            'views_cache' => 0,
            'slug' => '',
            'description' => '',
            'state' => 'private',
            'seo_description' => '',
            'duration' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'elapsed_time' => 'Dzisiaj',
            'views_cache_text' => '0 wyświetleń'
        ]);
    }

    private static $cacheTime = 7200;

    /**
     * Get video by state column
     * 
     * @param string $state Available: 'public','not_public','private','delete'
     * @param string $orderByColumnName
     * @param bool $desc
     * @param int $limit
     * @param bool $enableCache
     * @return \Illuminate\Database\Eloquent\Collection;
     */
    public static function getVideosByState(string $state, string $orderByColumnName = 'id', bool $desc = false, int $limit = 0, bool $enableCache = true)
    {
        $order = $desc ? 'DESC' : "ASC";
        $cacheName = $state . $orderByColumnName . $order . $limit;

        if (!$enableCache) {
            Cache::forget($cacheName);
        }

        $videos = Cache::remember($cacheName, self::$cacheTime, function () use ($state, $orderByColumnName, $order, $limit) {
            $tmpVideos = self::where('state', $state)
                ->where('slug', '!=', '')
                ->where('filename', '!=', '')
                ->where('thumb', '!=', '')
                ->orderBy($orderByColumnName, $order);

            if ($limit > 0) {
                $tmpVideos->limit($limit);
            }

            return $tmpVideos->get();
        });

        return $videos;
    }
}
