<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class SearchResult extends Component
{
    public $id;
    public $title;
    public $additional;
    public $active;
    public $route;
    public $icon;
    public $iconColor;

    /**
     * Create a new component instance.
     *
     * @param $result
     * @param $route
     * @param $icon
     * @param string $iconColor
     * @param array $additional
     */
    public function __construct($result, $route, $icon, $iconColor = 'primary')
    {
        $this->additional = (array) $result->additional;
        $this->id = $result->id;
        $this->title = $result->extended_name();
        $this->active = ($result->status ?? 'A') == 'A';
        $this->route = $route;
        $this->icon = $icon;
        $this->iconColor = $iconColor;
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
