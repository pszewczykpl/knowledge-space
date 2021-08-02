<?php

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class Datatable extends Component
{
    public $help_us;
    public $columns;
    public $info;
    public $id;

    /**
     * Create a new component instance.
     *
     * @param array $columns
     * @param bool $helpUs
     * @param bool $info
     */
    public function __construct(array $columns, bool $helpUs = false, bool $info = false, $id = 'table')
    {
        $this->columns = $columns;
        $this->help_us = $helpUs;
        $this->info = $info;
        $this->id = $id;
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
