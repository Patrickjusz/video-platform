<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['haker', 'xss', 'sql', 'css', 'lfi', 'linux', 'windows', 'cracker', 'audyt'];

        foreach ($tags as $tag) {
            $randDate = Carbon::today()->subDays(rand(0, 865));
            DB::table('tags')->insert([
                'name' => $tag,
                'created_at' => $randDate,
                'updated_at' => $randDate
            ]);
        }
    }
}
