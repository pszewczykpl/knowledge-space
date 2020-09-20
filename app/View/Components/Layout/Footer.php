<?php

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Year
     */
    public $year;

    /**
     * App version
     */
    public $version;

    /**
     * App name
     */
    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->year = date('Y');
        $this->version = config('app.version');
        $this->name = config('app.name');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.layout.footer');
    }
}
