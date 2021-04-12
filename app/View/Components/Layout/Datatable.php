<?php

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class Datatable extends Component
{
    public $help_us;
    public $columns;
    public $info;

    /**
     * Create a new component instance.
     *
     * @param array $columns
     * @param bool $helpUs
     * @param bool $info
     */
    public function __construct(array $columns, bool $helpUs = false, bool $info = false)
    {
        $this->columns = $columns;
        $this->help_us = $helpUs;
        $this->info = $info;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.datatable');
    }
}
