<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use getID3;
use Carbon\Carbon;

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
        // $videoId = $this->getKey('id');

        /**
         * Alghoritm:
         * -Get tags
         * -Get similar video by tags
         * -Order by views,created_at
         * -if ($rows<$limit) { //get next similar videos }
         */

        // $tags = $this->tags;

        // foreach ($tags as $tag) {
        //     $tag = Tag::find($tag->id);

        //     if (!empty($tag->videos))
        //     {
        //          $similarVideos->merge($tag->videos);
        //     }
        // }

        // dd($similarVideos);
        // $vid = DB::select('SELECT video_id FROM tag_video WHERE tag_id = 1 LIMIT 10');
        // return false;


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
}
