<?php

namespace App\View\Components\Panels;

use Illuminate\View\Component;

class Notes extends Component
{
    /**
     * Notes
     */
    public $notes;

    /**
     * Type
     */
    public $noteable_type;

    /**
     * Noteable_id
     */
    public $noteable_id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($notes, $type, $id)
    {
        $this->notes = $notes;
        $this->noteable_type = $type;
        $this->noteable_id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.panels.notes');
    }
}
