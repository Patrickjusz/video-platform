<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Faker\Generator as Faker;


// php artisan db:seed --class=VideoSeeder
class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['#haker', '#xss', '#sql', '#css', '#lfi', '#linux'];
        $state = ['active', 'active', 'inactive', 'delete'];
        $description = simplexml_load_file('http://www.lipsum.com/feed/xml?amount=1&what=paras&start=' . RAND(1, 100))->lipsum;

        foreach (range(0, 60) as $i) {
            DB::table('videos')->insert([
                'created_at' => Carbon::today()->subDays(rand(0, 865)),
                'name' => Str::random(40),
                'filename' => Str::random(16) . '.mp4',
                'thumb' => Str::random(16) . '.jpg',
                'slug' => (Str::random(3) . '-' . Str::random(7) . '-' . Str::random(9)),
                'views' => random_int(0, 99999),
                'state' => $state[array_rand($state, 1)],
                'description' => $description
            ]);
        }
    }
}
