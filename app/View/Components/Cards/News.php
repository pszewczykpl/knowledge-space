<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class News extends Component
{
    /**
     * News data
     */
    public $news;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($news)
    {
        $this->news = $news;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.cards.news');
    }
}
