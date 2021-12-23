<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CacheGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cache all data in app';

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
        /**
         * Lazy iterating through all rows and caching (most used) models with (most used) relations.
         */
        foreach (\App\Models\Bancassurance::cursor() as $bancassurance) {
            Cache::put("bancassurances:$bancassurance->id", \App\Models\Bancassurance::find($bancassurance->id), 60 * 60 * 12);
            Cache::put("bancassurances:$bancassurance->id:files", \App\Models\Bancassurance::find($bancassurance->id)->files, 60 * 60 * 12);
            Cache::put("bancassurances:$bancassurance->id:notes", \App\Models\Bancassurance::find($bancassurance->id)->notes, 60 * 60 * 12);
        }
        foreach (\App\Models\Employee::cursor() as $employee) {
            Cache::put("employees:$employee->id", \App\Models\Employee::find($employee->id), 60 * 60 * 12);
            Cache::put("employees:$employee->id:files", \App\Models\Employee::find($employee->id)->files, 60 * 60 * 12);
            Cache::put("employees:$employee->id:notes", \App\Models\Employee::find($employee->id)->notes, 60 * 60 * 12);
        }
        foreach (\App\Models\Investment::cursor() as $investment) {
            Cache::put("investments:$investment->id", \App\Models\Investment::find($investment->id), 60 * 60 * 12);
            Cache::put("investments:$investment->id:files", \App\Models\Investment::find($investment->id)->files, 60 * 60 * 12);
            Cache::put("investments:$investment->id:notes", \App\Models\Investment::find($investment->id)->notes, 60 * 60 * 12);
        }
        foreach (\App\Models\Protective::cursor() as $protective) {
            Cache::put("protectives:$protective->id", \App\Models\Protective::find($protective->id), 60 * 60 * 12);
            Cache::put("protectives:$protective->id:files", \App\Models\Protective::find($protective->id)->files, 60 * 60 * 12);
            Cache::put("protectives:$protective->id:notes", \App\Models\Protective::find($protective->id)->notes, 60 * 60 * 12);
        }

        return Command::SUCCESS;
    }
}
