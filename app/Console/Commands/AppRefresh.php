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
    protected $description = 'Refresh the application cache and migrate';

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
        $this->info('Clearing application caches...');
        $this->callSilently('config:cache');
        $this->info('Cached configuration cleared!');
        $this->callSilently('route:cache');
        $this->info('Cached routes cleared!');
        $this->callSilently('view:cache');
        $this->info('Compiled views cleared!');
        $this->callSilently('event:cache');
        $this->info('Cached events cleared!');
        $this->callSilently('clear-compiled');
        $this->info('Compiled services and packages cleared!');
        $this->callSilently('optimize:clear');
        $this->info('Cached bootstrap files cleared!');
        $this->callSilently('cache:clear');
        $this->info('Application cache cleared!');
        $this->info('All application caches cleared successfully!');

        $this->callSilently('package:discover');
        $this->info('Package manifest generated!');
        $this->callSilently('key:generate');
        $this->info('Application key set!');
        $this->callSilently('event:generate');
        $this->info('Application events and listeners generated!');
        $this->call('migrate', ['force' => true]);

        $this->info('Caching application...');
        $this->callSilently('config:cache');
        $this->info('Configuration cached!');
        $this->callSilently('route:cache');
        $this->info('Routes cached!');
        $this->callSilently('view:cache');
        $this->info('Views compiled!');
        $this->callSilently('event:cache');
        $this->info('Events and listeners cached!');
        $this->callSilently('optimize');
        $this->info('Bootstrap files cached!');
        $this->info('All application data cached!');

        $this->info('Application was successful refreshed!');
    }
}
