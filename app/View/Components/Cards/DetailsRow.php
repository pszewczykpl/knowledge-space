<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class DetailsRow extends Component
{
    /**
     * Attribute data
     */
    public $attribute;
    
    /**
     * Value data
     */
    public $value;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($attribute, $value)
    {
        $this->attribute = $attribute;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.cards.details-row');
    }
}
