<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class Details extends Component
{
    /**
     * Title data
     */
    public $title;
    
    /**
     * Description data
     */
    public $description;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.cards.details');
    }
}
