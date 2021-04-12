<?php

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class Subheader extends Component
{
    public $description;
    public $type;
    public $advanced;
    public $active;
    public $custom_active_text;

    /**
     * Create a new component instance.
     *
     * @param string $type
     * @param string|null $description
     * @param bool $advanced
     * @param bool $active
     */
    public function __construct(string $type = 'description', string $description = '', bool $advanced = false, bool $active = false, string $customActiveText = null)
    {
        $this->type = $type;
        $this->description = $description;
        $this->advanced = $advanced;
        $this->active = $active;
        $this->custom_active_text = $customActiveText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.subheader');
    }
}
