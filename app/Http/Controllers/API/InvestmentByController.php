<?php

namespace App\Http\Controllers\API;

use App\Models\Investment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class InvestmentByController extends Controller
{
    /**
     * Download Investment file by toil code
     * 
     * @param string $file_code Typ dokumentu wyszukiwany po nazwie pliku
     * @param string $code_toil Kod TOiL produktu Inwestycyjnego
     * @param string $start_date Data podpisania umowy na produkt Inwestycyjny
     * 
     * @return redirect
     */
    public function file_by_toil($file_code, $code_toil, $start_date)
    {
        $investment = Investment::where([
            ['code_toil', '=', str_replace("-", "/", $code_toil)],
            ['edit_date', '<=', $start_date]
        ])
        ->orderByDesc('edit_date')
        ->firstOrFail();

        $file = $investment->files()->where([
            ['code', $file_code],
            ['extension', 'pdf']
        ])->firstOrFail();

        return redirect()->route('files.download', $file->id);
    }

    /**
     * Generowanie paczki ZIP plików
     * 
     * @param string $file_type Typ dokumentu wyszukiwany po nazwie pliku
     * @param string $code_toil Kod TOiL produktu Inwestycyjnego
     * @param string $start_date Data podpisania umowy na produkt Inwestycyjny
     * 
     * @return file Zwracany jest dany dokument jako plik do pobrania
     */
    public function files_category_by_toil_zip($category_id, $code_toil, $start_date)
    {
        $investment = Investment::where([
            ['code_toil', '=', str_replace("-", "/", $code_toil)],
            ['edit_date', '<=', $start_date],
        ])
        ->orderByDesc('edit_date')
        ->firstOrFail();
        
        $files = $investment->files()->where([
            ['file_category_id', $category_id],
            ['extension', 'pdf'],
        ])->get();

        if($files->isEmpty()) {
            abort(404);
        }

        return redirect()->route('files.zip', ['id' => $files->pluck('id')->toArray(), 'name' => $files->first()->file_category->name]);
    }
}
