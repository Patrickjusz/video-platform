<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CacheRegenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site_cache:regenerate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Regenerate site cache';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Http::get(route('video.index'));
        Http::get(route('video.popular'));
        return 0;
    }
}
