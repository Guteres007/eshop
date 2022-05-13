<?php

namespace App\Console\Commands;

use App\Feeds\FeedExporter;
use App\Feeds\Google;
use App\Feeds\heureka;
use App\Services\Admin\FeedService;
use Illuminate\Console\Command;

class FeedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:generate {feed_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate all product feeds';

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
    public function handle(FeedService $feedService)
    {
        $feedName = $this->argument('feed_name');
        $feedService->generateFeedByName($feedName);
    }
}
