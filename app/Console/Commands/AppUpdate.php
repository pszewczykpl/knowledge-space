<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class AppUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update aplication to new version.';

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
        $this->callSilently('optimize:clear');
        $this->callSilently('cache:clear');
        $this->info('All cache cleared!');

        $this->callSilently('package:discover');
        $this->call('key:generate');
        $this->call('event:generate');
        $this->call('migrate');

        $this->callSilently('config:cache');
        $this->callSilently('route:cache');
        $this->callSilently('view:cache');
        $this->callSilently('event:cache');
        $this->callSilently('optimize');
        $this->info('All data cached!');

        $this->newLine();
        $this->info('App was successful updated!');
    }
}
