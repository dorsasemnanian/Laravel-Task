<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\FetchPostsJob;

class FetchPostsCommand extends Command
{
    protected $signature = 'fetch:posts';

    protected $description = 'Fetch 50 posts from API and save them to the database';


    public function handle()
    {
        FetchPostsJob::dispatch();
        $this->info('Posts fetched and stored successfully.');
    }
}
