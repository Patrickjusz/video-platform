<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use getID3;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Artisan;
use App\Services\Sitemap;
use Laravelista\Comments\Commentable;


class Video extends Model
{
    use HasFactory, Commentable;

    protected $fillable = ['name', 'filename', 'thumb', 'views_cache', 'slug', 'state', 'description', 'created_at', 'seo_description', 'duration', 'seo_keywords', 'elapsed_time', 'views_cache_text'];
    private static $cacheTime = 7200;

    /**
     * Get tags (belongsToMany)
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }

    /**
     * Get views (hasMany)
     */
    public function views()
    {
        return $this->hasMany('App\Models\View');
    }

    /**
     * Get similar videos
     * 
     * @param  int $limit
     * @return \App\Models\Video;
     */
    public function getSimilarVideos(int $limit = 10)
    {
        return Video::inRandomOrder()->where('state', 'public')->limit($limit)->get();
    }

    /**
     * Get video details
     */
    private function getDetails(string $videoPath)
    {
        $getID3 = new getID3;
        $fileInfo = $getID3->analyze($videoPath);

        return $fileInfo;
    }

    /**
     * Get video duration
     * 
     * @return string;
     */
    public function getDuration(): string
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
    public static function getVisibleVideoBySlug(string $slug)
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

        $videosCallback = function () use ($state, $orderByColumnName, $order, $limit) {
            $tmpVideos = self::where('state', $state)
                ->where('slug', '!=', '')
                ->where('filename', '!=', '')
                ->where('thumb', '!=', '')
                ->orderBy($orderByColumnName, $order);

            if ($limit > 0) {
                $tmpVideos->limit($limit);
            }
            return $tmpVideos->get();
        };

        $videos = $enableCache ? Cache::remember($cacheName, self::$cacheTime, $videosCallback) : $videosCallback();

        return $videos;
    }

    /**
     * Update video record from the DB
     * 
     * @param int $id
     * @param \Illuminate\Http\Request $request
     * @return bool;
     */
    public static function updateVideo(int $id, Request $request): bool
    {
        $video = Video::findOrFail($id);
        $input = $request->all();
        $videoFile = $request->file('video_file') ?? false;
        $thumbFile = $request->file('thumb_file') ?? false;
        $toRemove = [];

        $seo_description = trim($request->input('seo_description') ?? '');
        if (empty($seo_description)) {
            $input['seo_description'] = htmlToString($request->input('description') ?? $video->description ?? '');
        }

        if (!empty($input['seo_keywords'])) {
            $input['seo_keywords']  = trim($input['seo_keywords']);
        }

        if (!empty($videoFile)) {
            ini_set('max_execution_time', 7200); //2h
            $videoNewPath =  $videoFile->store('videos', 'public');

            if ($videoNewPath) {
                $input['filename'] = $videoNewPath;
            }

            !empty($video->filename) ? $toRemove[] = $video->filename : false;
        }

        if (!empty($thumbFile)) {
            $thumbNewPath =  $thumbFile->store('thumbs', 'public');

            if ($thumbNewPath) {
                $input['thumb'] = $thumbNewPath;
            }

            !empty($video->thumb) ? $toRemove[] = $video->thumb : false;
        }

        $video->elapsed_time = timeElapsedString($video->created_at);

        if ($video->update($input)) {
            foreach ($toRemove as $file) {
                Storage::delete('public/' .  $file);
            }

            $videoDuration = $video->getDuration();
            if (!empty($videoDuration)) {
                $video->duration = $videoDuration;
                $video->save();
            }

            $tagsIds = $request->input('TagsList');
            $video->tags()->sync($tagsIds);

            Session::flash('status', 'Wideo zostało zaktualizowane');
            Sitemap::create();
            Artisan::call('cache:clear');

            return true;
        }

        return false;
    }
}
