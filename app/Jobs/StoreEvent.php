<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StoreEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Model
     */
    public Model $model;

    /**
     * @var User|null
     */

    public ?User $user;

    /**
     * @var string
     */
    public $type;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $type, Model $model)
    {
        $this->model = $model;
        $this->type = $type;
        
        if(Auth::check())
            $this->user = Auth::user();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $event = new Event();
        $event->event = $this->type;
        $event->eventable()->associate($this->model);
        
        if(! is_null($this->user))
            $this->user->events()->save($event);
        else
            $event->save();
    }
}
