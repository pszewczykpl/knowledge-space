<?php

namespace App\View\Components\Datatables;

use Illuminate\View\Component;

class SearchBox extends Component
{
    /**
     * Number data
     */
    public $number;

    /**
     * Placeholder data
     */
    public $placeholder;

    /**
     * Size data
     */
    public $size;

    /**
     * Size data
     */
    public $hidden;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($number, $placeholder, $size, $hidden = false)
    {
        $this->number = $number;
        $this->placeholder = $placeholder;
        $this->size = $size;
        $this->hidden = $hidden;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.datatables.search-box');
    }
}
