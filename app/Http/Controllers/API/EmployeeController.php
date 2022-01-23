<?php

namespace App\Http\Controllers\API;

use App\Models\Bancassurance;
use App\Models\Employee;
use App\Models\File;
use App\Models\FileCategory;

use App\Repositories\Facades\DataTable;
use App\Traits\HasDatatables;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use ZipArchive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource for datatables.net plugin.
     *
     * @param Request $request
     * @return array
     */
    public function datatables(Request $request): array
    {
        return DataTable::of(Employee::class, $request)->get();
    }

    /**
     * Generate zip archive
     *
     * @param $employee
     * @return  RedirectResponse@zipFiles
     */
    public function zipFiles(Employee $employee)
    {
        $files = $employee->files->where('draft', false);

        return redirect()->route('files.zip', ['id' => $files->pluck('id')->toArray(), 'filename' => str_replace(['/', '\\', ':', '*', '<', '>', '?', '"', '|'], "_", $employee->extended_name)]);
    }

}
