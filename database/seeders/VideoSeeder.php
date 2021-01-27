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
        foreach (range(0, 30) as $i) {
            DB::table('videos')->insert([
                'created_at' => Carbon::now(),
                'name' => Str::random(100),
                'filename' => Str::random(16) . '.mp4',
                'imagename' => Str::random(16) . '.jpg',
                'tags' => $tags[array_rand($tags, 1)] . $tags[array_rand($tags, 1)],
                'slug' => (Str::random(3) . '-' . Str::random(7) . '-' . Str::random(9)),
                'views' => random_int(0, 99999),
                'state' => $state[array_rand($state, 1)],
            ]);
        }
    }
}
