<?php

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class Head extends Component
{
    /** 
     * Title Page
     */
    public $title;

    /**
     * App name
     */
    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title)
    {
        $this->title = $title;
        $this->name = config('app.name');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.layout.head');
    }
}
