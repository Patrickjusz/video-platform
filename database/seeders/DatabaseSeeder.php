<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            VideosSeeder::class,
            TagsSeeder::class,
            TagVideoSeeder::class,
            UsersSeeder::class,
        ]);

        Artisan::call('cache:clear');
    }
}
