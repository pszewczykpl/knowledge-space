<?php

namespace App\View\Components\Cards;

use App\Models\Event;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class TopEvents extends Component
{
    /**
     * News Model
     */
    public $events;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->events = Cache::tags(['events'])->rememberForever('events_top_8', function () {
            return Event::with('user')->where('visible', 1)->orderByDesc('created_at')->take(8)->get();
        });
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.cards.top-events');
    }
}
