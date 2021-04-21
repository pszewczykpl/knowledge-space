<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class SearchResult extends Component
{
    public $result;
    public $icon;
    public $route;

    /**
     * Create a new component instance.
     *
     * @param $result
     */
    public function __construct($result, $icon, $route)
    {
        $this->result = $result;
        $this->icon = $icon;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.search-result');
    }
}
