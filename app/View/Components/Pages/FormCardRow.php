<?php

namespace App\View\Components\Pages;

use Illuminate\View\Component;

class FormCardRow extends Component
{
    public $label;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $label)
    {
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pages.form-card-row');
    }
}
