<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Investment;
use App\Employee;
use App\Protective;

use App\File;
use App\Risk;
use App\Fund;
use App\Partner;
use App\InvestmentGroup;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * API datatables for investments table
 */
Route::post('datatables/investments', function (Request $request) {
    $records = Investment::where(function ($query) {
            if($_POST['search']['value'] != null) {
                foreach($_POST['columns'] as $column) {
                    if($column['searchable'] == 'true') {
                        $query->orWhere($column['data'], 'like', '%' . trim($_POST['search']['value']) . '%');
                    }
                }
            }
        })

        ->where(function ($query) {
            foreach($_POST['columns'] as $column) {
                if($column['searchable'] == 'true' && $column['search']['value'] != null) {
                    $query->where($column['data'], 'like', '%' . trim($column['search']['value']) . '%');
                }
            }
        })

        ->orderBy($_POST['columns'][$_POST['order'][0]['column']]['data'], $_POST['order'][0]['dir'])
        ->orderBy('edit_date', 'desc');

        $filtered = $records->count();

        $records = $records
        ->limit($_POST['length'])
        ->offset($_POST['start'])
        ->get();

        $json_data = array(
            "draw"            => intval($_POST['draw']),
            "recordsTotal"    => Investment::count(),
            "recordsFiltered" => $filtered,
            "data"            => $records
        );

        return $json_data;
});

/**
 * API datatables for employees table
 */
Route::post('datatables/employees', function (Request $request) {
    $records = Employee::where(function ($query) {
            if($_POST['search']['value'] != null) {
                foreach($_POST['columns'] as $column) {
                    if($column['searchable'] == 'true') {
                        if(!isset($i)) {
                            $query->where($column['data'], 'like', '%' . trim($_POST['search']['value']) . '%');
                            $i = 1;
                        }
                        else {
                            $query->orWhere($column['data'], 'like', '%' . trim($_POST['search']['value']) . '%');
                        }
                    }
                }
            }
        })

        ->where(function ($query) {
            foreach($_POST['columns'] as $column) {
                if($column['searchable'] == 'true' && $column['search']['value'] != null) {
                    $query->where($column['data'], 'like', '%' . trim($column['search']['value']) . '%');
                }
            }
        })

        ->orderBy($_POST['columns'][$_POST['order'][0]['column']]['data'], $_POST['order'][0]['dir'])
        ->orderBy('edit_date', 'desc');

        $filtered = $records->count();

        $records = $records
        ->limit($_POST['length'])
        ->offset($_POST['start'])
        ->get();

        $json_data = array(
            "draw"            => intval($_POST['draw']),
            "recordsTotal"    => Employee::count(),
            "recordsFiltered" => $filtered,
            "data"            => $records
        );

        return $json_data;
});

/**
 * API datatables for protectives table
 */
Route::post('datatables/protectives', function (Request $request) {
    $records = Protective::where(function ($query) {
            if($_POST['search']['value'] != null) {
                foreach($_POST['columns'] as $column) {
                    if($column['searchable'] == 'true') {
                        if(!isset($i)) {
                            $query->where($column['data'], 'like', '%' . trim($_POST['search']['value']) . '%');
                            $i = 1;
                        }
                        else {
                            $query->orWhere($column['data'], 'like', '%' . trim($_POST['search']['value']) . '%');
                        }
                    }
                }
            }
        })

        ->where(function ($query) {
            foreach($_POST['columns'] as $column) {
                if($column['searchable'] == 'true' && $column['search']['value'] != null) {
                    $query->where($column['data'], 'like', '%' . trim($column['search']['value']) . '%');
                }
            }
        })

        ->orderBy($_POST['columns'][$_POST['order'][0]['column']]['data'], $_POST['order'][0]['dir'])
        ->orderBy('edit_date', 'desc');

        $filtered = $records->count();

        $records = $records
        ->limit($_POST['length'])
        ->offset($_POST['start'])
        ->get();

        $json_data = array(
            "draw"            => intval($_POST['draw']),
            "recordsTotal"    => Protective::count(),
            "recordsFiltered" => $filtered,
            "data"            => $records
        );

        return $json_data;
});

/**
 * API datatables for funds table
 */
Route::post('datatables/funds', function (Request $request) {
    $records = Fund::where(function ($query) {
            if($_POST['search']['value'] != null) {
                foreach($_POST['columns'] as $column) {
                    if($column['searchable'] == 'true') {
                        if(!isset($i)) {
                            $query->where($column['data'], 'like', '%' . trim($_POST['search']['value']) . '%');
                            $i = 1;
                        }
                        else {
                            $query->orWhere($column['data'], 'like', '%' . trim($_POST['search']['value']) . '%');
                        }
                    }
                }
            }
        })

        ->where(function ($query) {
            foreach($_POST['columns'] as $column) {
                if($column['searchable'] == 'true' && $column['search']['value'] != null) {
                    $query->where($column['data'], 'like', '%' . trim($column['search']['value']) . '%');
                }
            }
        })

        ->orderBy($_POST['columns'][$_POST['order'][0]['column']]['data'], $_POST['order'][0]['dir'])
        ->orderBy('start_date', 'desc');

        $filtered = $records->count();

        $records = $records
        ->limit($_POST['length'])
        ->offset($_POST['start'])
        ->get();

        $json_data = array(
            "draw"            => intval($_POST['draw']),
            "recordsTotal"    => Fund::count(),
            "recordsFiltered" => $filtered,
            "data"            => $records
        );

        return $json_data;
});

/**
 * API datatables for partners table
 */
Route::post('datatables/partners', function (Request $request) {
    $records = Partner::where(function ($query) {
            if($_POST['search']['value'] != null) {
                foreach($_POST['columns'] as $column) {
                    if($column['searchable'] == 'true') {
                        if(!isset($i)) {
                            $query->where($column['data'], 'like', '%' . trim($_POST['search']['value']) . '%');
                            $i = 1;
                        }
                        else {
                            $query->orWhere($column['data'], 'like', '%' . trim($_POST['search']['value']) . '%');
                        }
                    }
                }
            }
        })

        ->where(function ($query) {
            foreach($_POST['columns'] as $column) {
                if($column['searchable'] == 'true' && $column['search']['value'] != null) {
                    $query->where($column['data'], 'like', '%' . trim($column['search']['value']) . '%');
                }
            }
        })

        ->orderBy($_POST['columns'][$_POST['order'][0]['column']]['data'], $_POST['order'][0]['dir']);

        $filtered = $records->count();

        $records = $records
        ->limit($_POST['length'])
        ->offset($_POST['start'])
        ->get();

        $json_data = array(
            "draw"            => intval($_POST['draw']),
            "recordsTotal"    => Partner::count(),
            "recordsFiltered" => $filtered,
            "data"            => $records
        );

        return $json_data;
});

/**
 * API datatables for investment_groups table
 */
Route::post('datatables/investment-groups', function (Request $request) {
    $records = InvestmentGroup::where(function ($query) {
            if($_POST['search']['value'] != null) {
                foreach($_POST['columns'] as $column) {
                    if($column['searchable'] == 'true') {
                        if(!isset($i)) {
                            $query->where($column['data'], 'like', '%' . trim($_POST['search']['value']) . '%');
                            $i = 1;
                        }
                        else {
                            $query->orWhere($column['data'], 'like', '%' . trim($_POST['search']['value']) . '%');
                        }
                    }
                }
            }
        })

        ->where(function ($query) {
            foreach($_POST['columns'] as $column) {
                if($column['searchable'] == 'true' && $column['search']['value'] != null) {
                    $query->where($column['data'], 'like', '%' . trim($column['search']['value']) . '%');
                }
            }
        })

        ->orderBy($_POST['columns'][$_POST['order'][0]['column']]['data'], $_POST['order'][0]['dir']);

    $filtered = $records->count();

    $records = $records
        ->limit($_POST['length'])
        ->offset($_POST['start'])
        ->get();

    $json_data = array(
        "draw"            => intval($_POST['draw']),
        "recordsTotal"    => InvestmentGroup::count(),
        "recordsFiltered" => $filtered,
        "data"            => $records
    );

    return $json_data;
});

/**
 * API datatables for risks table
 */
Route::post('datatables/risks', function (Request $request) {
    $records = Risk::where(function ($query) {
            if($_POST['search']['value'] != null) {
                foreach($_POST['columns'] as $column) {
                    if($column['searchable'] == 'true') {
                        if(!isset($i)) {
                            $query->where($column['data'], 'like', '%' . trim($_POST['search']['value']) . '%');
                            $i = 1;
                        }
                        else {
                            $query->orWhere($column['data'], 'like', '%' . trim($_POST['search']['value']) . '%');
                        }
                    }
                }
            }
        })

        ->where(function ($query) {
            foreach($_POST['columns'] as $column) {
                if($column['searchable'] == 'true' && $column['search']['value'] != null) {
                    $query->where($column['data'], 'like', '%' . trim($column['search']['value']) . '%');
                }
            }
        })

        ->orderBy($_POST['columns'][$_POST['order'][0]['column']]['data'], $_POST['order'][0]['dir']);

        $filtered = $records->count();

        $records = $records
        ->limit($_POST['length'])
        ->offset($_POST['start'])
        ->get();

        $json_data = array(
            "draw"            => intval($_POST['draw']),
            "recordsTotal"    => Risk::count(),
            "recordsFiltered" => $filtered,
            "data"            => $records
        );

        return $json_data;
});

/**
 * API datatables for surgeries table
 */
Route::post('datatables/surgeries', function (Request $request) {
    $records = Surgeries::where(function ($query) {
            if($_POST['search']['value'] != null) {
                foreach($_POST['columns'] as $column) {
                    if($column['searchable'] == 'true') {
                        if(!isset($i)) {
                            $query->where($column['data'], 'like', '%' . trim($_POST['search']['value']) . '%');
                            $i = 1;
                        }
                        else {
                            $query->orWhere($column['data'], 'like', '%' . trim($_POST['search']['value']) . '%');
                        }
                    }
                }
            }
        })

        ->where(function ($query) {
            foreach($_POST['columns'] as $column) {
                if($column['searchable'] == 'true' && $column['search']['value'] != null) {
                    $query->where($column['data'], 'like', '%' . trim($column['search']['value']) . '%');
                }
            }
        })

        ->orderBy($_POST['columns'][$_POST['order'][0]['column']]['data'], $_POST['order'][0]['dir']);

        $filtered = $records->count();

        $records = $records
        ->limit($_POST['length'])
        ->offset($_POST['start'])
        ->get();

        $json_data = array(
            "draw"            => intval($_POST['draw']),
            "recordsTotal"    => Surgeries::count(),
            "recordsFiltered" => $filtered,
            "data"            => $records
        );

        return $json_data;
});

/**
 * API do pobierania plików dla produktów Inwestycyjnych
 * 
 * @param string $file_type Typ dokumentu wyszukiwany po nazwie pliku
 * @param string $code_toil Kod TOiL produktu Inwestycyjnego
 * @param string $start_date Data podpisania umowy na produkt Inwestycyjny
 * 
 * @return file Zwracany jest dany dokument jako plik do pobrania
 */
Route::get('1/{file_type}/{code_toil}/{start_date}', function ($file_type, $code_toil, $start_date) {

    $code_toil = str_replace("-", "/", $code_toil);
    
    $investment = Investment::where([
        ['code_toil', '=', $code_toil],
        ['edit_date', '<', $start_date]
    ])
    ->orderByDesc('edit_date')
    ->firstOrFail();

    $file = File::join('file_investment', 'file_investment.file_id', '=', 'files.id')
        ->where([
            ['path', 'like', '%/' . $file_type . '.%'],
            ['file_investment.investment_id', '=', $investment->id]
        ])->firstOrFail();

    return Storage::download($file->path, $file->name . '.' . $file->extension);
});

/**
 * API do pobierania plików dla produktów Ochronnych
 * 
 * @param string $file_type Typ dokumentu wyszukiwany po nazwie pliku
 * @param string $code_toil Kod TOiL produktu Inwestycyjnego
 * @param string $start_date Data podpisania umowy na produkt Inwestycyjny
 * 
 * @return file Zwracany jest dany dokument jako plik do pobrania
 */
Route::get('2/{file_type}/{code}/{dist_short}/{start_date}', function ($file_type, $code, $dist_short, $start_date) {

    $protective = Protective::where([
        ['code', '=', $code],
        ['dist_short', '=', $dist_short],
        ['edit_date', '<', $start_date],
    ])
    ->orderByDesc('edit_date')
    ->firstOrFail();

    $file = File::join('file_protective', 'file_protective.file_id', '=', 'files.id')
        ->where([
            ['path', 'like', '%/' . $file_type . '.%'],
            ['file_protective.protective_id', '=', $protective->id]
        ])->firstOrFail();

    return Storage::download($file->path, $file->name . '.' . $file->extension);
});

/**
 * Generowanie plików ZIP
 */
Route::get('investments/{id}/files/zip', function ($id) {

    $tmp_file = 'storage/uploads/tmp.zip';

    $files = File::select('files.*')
        ->join('file_investment', 'file_investment.file_id', '=', 'files.id')
        ->where([
            ['file_investment.investment_id', '=', $id],
            ['files.extension', '=', 'pdf'],
        ])
        ->where(function($query) {
            $query->orWhere('files.file_category_id', 1)
                  ->orWhere('files.file_category_id', 2)
                  ->orWhere('files.file_category_id', 3)
                  ->orWhere('files.file_category_id', 4);
        })
        ->get();

    if(file_exists($tmp_file)) {
        unlink($tmp_file);
    }

    $zip = new ZipArchive;

    if ($zip->open($tmp_file, ZipArchive::CREATE) === TRUE) {

        foreach($files as $file) {
            if($file->file_category_id == 4) {
                $zip->addFile('storage/uploads/' . $file->path, 'Strategia Inwestycyjna ' . $file->name . '.' . $file->extension);
            }
            else {
                $zip->addFile('storage/uploads/' . $file->path, $file->name . '.' . $file->extension);
            }
        }

        $zip->close();

    }

    $investment = Investment::findOrFail($id);

    return Storage::download('tmp.zip', $investment->name . ' (' . $investment->dist_short . ') od ' . $investment->edit_date . '.zip');
});