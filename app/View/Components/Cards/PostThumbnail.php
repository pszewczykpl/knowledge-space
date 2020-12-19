<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class PostThumbnail extends Component
{
    /**
     * News data
     */
    public $post;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.cards.post-thumbnail');
    }
}
