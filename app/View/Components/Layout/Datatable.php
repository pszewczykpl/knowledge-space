<?php

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class Datatable extends Component
{
    public $datatableSettings;
    public $id;

    /**
     * Create a new component instance.
     *
     * @param array $columns
     * @param bool $helpUs
     * @param bool $info
     */
    public function __construct($data, $id = 'table')
    {
        $this->datatableSettings = $data;
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
