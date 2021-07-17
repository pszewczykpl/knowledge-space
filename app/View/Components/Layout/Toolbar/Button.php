<?php

namespace App\View\Components\Layout\Toolbar;

use Illuminate\View\Component;

class Button extends Component
{
    public $action;
    public $href;
    public $color;
    public $svg;
    public $title;
    public $onclick;
        
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $svg = null, $color = null, $title = null, $href = null, $onclick = null)
    {
        $this->action = $action;
        $this->href = $href;
        $this->color = $color ?? match ($action) {
            'back' => 'gray-600',
            'cancel' => 'gray-600',
            'destroy' => 'danger',
            default => 'primary',
        };
        $this->svg = $svg ?? match ($action) {
            'back' => 'back',
            'edit' => 'edit',
            'duplicate' => 'duplicate',
            'destroy' => 'trash',
            'cancel' => 'back',
            'save' => 'save',
            default => 'back',
        };
        $this->title = $title ?? match ($action) {
            'back' => 'Powrót',
            'edit' => 'Edytuj',
            'destroy' => 'Usuń',
            'duplicate' => 'Duplikuj',
            'cancel' => 'Anuluj',
            'save' => 'Zapisz',
            default => 'Przycisk',
        };
        $this->onclick = $onclick;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.toolbar.button');
    }
}
