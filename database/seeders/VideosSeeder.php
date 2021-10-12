<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Video;

class VideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state = ['public', 'not_public', 'private', 'delete'];
        $thumb = ['thumbs/1.jpg', 'thumbs/2.jpg', 'thumbs/3.jpg', 'thumbs/4.jpg'];
        $videos = ['sample1.mp4', 'sample2.mp4', 'sample3.mp4'];
        $description = simplexml_load_file('http://www.lipsum.com/feed/xml?amount=1&what=paras&start=' . RAND(1, 100))->lipsum;

        foreach (range(0, 100) as $i) {
            $name = Str::random(40);
            $nameLenght = strlen($name);
            for ($i = 0; $i < $nameLenght; $i++) {
                if (rand(1, 100) % 7 == 0) {
                    $name[$i] = ' ';
                }
            }

            $name = trim($name);

            DB::table('videos')->insert([
                'created_at' => Carbon::today()->subDays(rand(0, 1265)),
                'name' => $name,
                'filename' => $videos[array_rand($videos, 1)],
                'thumb' => $thumb[array_rand($thumb, 1)],
                'slug' => (Str::random(3) . '-' . Str::random(7) . '-' . Str::random(9)),
                'views_cache' => random_int(0, 999999),
                'state' => $state[array_rand($state, 1)],
                'description' => $description,
                'seo_description' => htmlToString($description)
            ]);
        }

        $video = Video::where('state', '!=', 'delete')->orderByDesc('created_at')->get();

        foreach ($video as $video) {
            $video->eclapsed_time = timeElapsedString($video->created_at);
            $video->save();
        }
    }
}
