<?php

namespace App\View\Components\Panels;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;
use App\Models\FileCategory;

class Files extends Component
{
    /**
     * Files
     */
    public $files;

    /**
     * File Categories
     */
    public $fileCategories;

    /**
     * ZIP filename
     */
    public $name;

    public $fileable_type;

    public $fileable_id;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($files, $name, $type, $id)
    {
        $fileCategories = Cache::tags([$type,'file_categories', 'files'])->rememberForever($type . '_' . $id . '_file_categories_all', function () use ($files) {
            return FileCategory::whereIn('id', $files->pluck('file_category_id')->toArray())->get();
        });

        $this->files = $files;
        $this->fileCategories = $fileCategories;
        $this->name =  $name;
        $this->fileable_type = $type;
        $this->fileable_id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.panels.files');
    }
}
