<?php

namespace App\View\Components\Panels;

use Illuminate\View\Component;

class Funds extends Component
{
    /**
     * investment_id
     */
    public $investment_id;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($investmentid)
    {
        $this->investment_id = $investmentid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.panels.funds');
    }
}
