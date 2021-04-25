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
    public string $name;

    public string $fileable_type;

    public int $fileable_id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model)
    {

        $this->files = $model->files;
        $this->name = str_replace(['/', '\\', ':', '*', '<', '>', '?', '"', '|'], "_", $model->extended_name);

        $fileCategories = Cache::tags([$model->getTable(),'file_categories', 'files'])->rememberForever($model->getTable() . '_' . $model->id . '_file_categories_get', function () use ($model) {
            return FileCategory::whereIn('id', $model->files->pluck('file_category_id')->toArray())->get();
        });

        $this->fileCategories = $fileCategories;
        $this->fileable_type = $model->getTable();
        $this->fileable_id = $model->id;
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
