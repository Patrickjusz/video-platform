<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Video;
use Illuminate\Support\Facades\DB;

class CountViews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'count:views';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate views from views table.';

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
        $videos = DB::table('views')
            ->selectRaw('video_id, count(video_id) as views')
            ->groupBy('video_id')
            ->get();

        foreach ($videos as $video) {
            $res = Video::where('id', $video->video_id)
                ->update(['views_cache' => $video->views, 'views_cache_text' =>  shortNumberFormat($video->views)]);
        }

        $this->info('Views cache updated.');

        return 0;
    }
}
