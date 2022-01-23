<?php

namespace App\View\Components\Panels;

use App\Models\Bancassurance;
use App\Models\Employee;
use App\Models\Investment;
use App\Models\Protective;
use App\Traits\HasDatatables;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;
use App\Models\FileCategory;
use App\Models\File;

class Files extends Component
{
    public $files;
    public $fileCategories;

    public string $type;
    public int $id;
    public string $status;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Model $model)
    {
        $fileCategories = FileCategory::all();
        $this->fileCategories = $fileCategories->whereIn('id', $model->files->pluck('file_category_id')->toArray());
        $this->files = $model->files;

        $this->type = $model->getTable();
        $this->id = $model->id;
        $this->status = $model->status;
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
