<?php

namespace App\View\Components\Panels;

use Illuminate\View\Component;
use App\FileCategory;

class FilesPanel extends Component
{
    /**
     * Files
     */
    public $files;

    /**
     * File Categories
     */
    public $file_categories;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($files)
    {
        $this->files = $files;
        
        $z = [];

        foreach($files as $file) {
            array_push($z, $file->file_category_id);
        }

        $this->file_categories = FileCategory::whereIn('id', $z)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.panels.files-panel');
    }
}
