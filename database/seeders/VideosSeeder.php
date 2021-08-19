<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
