<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Faker\Generator as Faker;
use App\Models\Tag;
use App\Models\Video;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['haker', 'xss', 'sql', 'css', 'lfi', 'linux', 'windows', 'cracker', 'audyt'];
        $state = ['active', 'active', 'inactive', 'delete'];
        $thumb = ['1.jpg', '2.jpg', '3.jpg', '4.jpg'];
        $videos = ['sample1.mp4', 'sample2.mp4', 'sample3.mp4'];
        $description = simplexml_load_file('http://www.lipsum.com/feed/xml?amount=1&what=paras&start=' . RAND(1, 100))->lipsum;

        foreach (range(0, 60) as $i) {
            DB::table('videos')->insert([
                'created_at' => Carbon::today()->subDays(rand(0, 865)),
                'name' => Str::random(40),
                'filename' => $videos[array_rand($videos, 1)],
                'thumb' => $thumb[array_rand($thumb, 1)],
                'slug' => (Str::random(3) . '-' . Str::random(7) . '-' . Str::random(9)),
                'views' => random_int(0, 99999),
                'state' => $state[array_rand($state, 1)],
                'description' => $description
            ]);
        }

        foreach ($tags as $tag) {
            $randDate = Carbon::today()->subDays(rand(0, 865));
            DB::table('tags')->insert([
                'name' => $tag,
                'created_at' => $randDate,
                'updated_at' => $randDate
            ]);
        }

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
