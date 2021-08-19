<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use getID3;

class Video extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }


    // TODO 
    public function getSimilarVideos(int $limit = 10)
    {
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


        return Video::inRandomOrder()->where('state', 'active')->limit($limit)->get();
    }


    private function getDetails(string $videoPath)
    {
        $getID3 = new getID3;
        $fileInfo = $getID3->analyze($videoPath);

        return $fileInfo;
    }


    public function getDuration()
    {
        return ($this->getDetails(VIDEO_PATH . '/' . $this->filename)['playtime_string']) ?? '';
    }
}
