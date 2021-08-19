<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;
use App\Models\Video;


class TagVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::all();
        $tagsIds = $tags->pluck('id')->toArray();

        $videos = Video::where('state', 'active')->get();
        foreach ($videos as $video) {
            $randDate = Carbon::today()->subDays(rand(0, 865));
            DB::table('tag_video')->insert([
                'video_id' => $video->id,
                'tag_id' => $tagsIds[array_rand($tagsIds, 1)],
                'created_at' => $randDate,
                'updated_at' => $randDate
            ]);
        }

        foreach ($videos as $video) {
            $randDate = Carbon::today()->subDays(rand(0, 865));
            DB::table('tag_video')->insert([
                'video_id' => $video->id,
                'tag_id' => $tagsIds[array_rand($tagsIds, 1)],
                'created_at' => $randDate,
                'updated_at' => $randDate
            ]);
        }
    }
}
