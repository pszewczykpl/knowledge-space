<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppRefresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh the application cache and run migrate';

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
     */
    public function handle()
    {
        // First, we clear all cached data.
        $this->info('Clearing application caches...');

        $this->callSilently('config:clear');
        $this->callSilently('route:clear');
        $this->callSilently('view:clear');
        $this->callSilently('event:clear');
        $this->callSilently('optimize:clear');

        $this->callSilently('cache:clear');
        $this->callSilently('clear-compiled');

        // Finally, we cache all app data/configs.
        $this->callSilently('config:cache');
        $this->callSilently('route:cache');
        $this->callSilently('view:cache');
        $this->callSilently('event:cache');
        $this->callSilently('optimize');

        $this->info('Application was successful refreshed!');
    }

}
