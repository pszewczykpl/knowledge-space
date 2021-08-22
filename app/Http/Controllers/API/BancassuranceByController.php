<?php

namespace App\Http\Controllers\API;

use App\Models\Bancassurance;

use App\Http\Controllers\Controller;

class BancassuranceByController extends Controller
{
    /**
     * Download Bancassurance file by toil code
     * 
     * @param string $file_code Typ dokumentu wyszukiwany po nazwie pliku
     * @param string $code Kod TOiL produktu Inwestycyjnego
     * @param string $start_date Data podpisania umowy na produkt Inwestycyjny
     * 
     * @return file Zwracany jest dany dokument jako plik do pobrania
     */
    public function file_by_code($file_code, $code, $dist_short, $start_date)
    {
        $bancassurance = Bancassurance::where([
            ['code', '=', $code],
            ['dist_short', '=', $dist_short],
            ['edit_date', '<=', $start_date],
        ])
        ->orderByDesc('edit_date')
        ->firstOrFail();
    
        $file = $bancassurance->files()->where([
            ['code', $file_code],
            ['extension', '=', 'pdf']
        ])->firstOrFail();

        return redirect()->route('files.download', $file->id);
    }

    /**
     * Generowanie paczki ZIP plików
     * 
     * @param string $file_type Typ dokumentu wyszukiwany po nazwie pliku
     * @param string $code Kod TOiL produktu Inwestycyjnego
     * @param string $start_date Data podpisania umowy na produkt Inwestycyjny
     * 
     * @return file Zwracany jest dany dokument jako plik do pobrania
     */
    public function files_category_by_code_zip($category_id, $code, $dist_short, $start_date)
    {
        $bancassurance = Bancassurance::where([
            ['code', '=', $code],
            ['dist_short', '=', $dist_short],
            ['edit_date', '<=', $start_date],
        ])
        ->orderByDesc('edit_date')
        ->firstOrFail();
        
        $files = $bancassurance->files()->where([
            ['file_category_id', $category_id],
            ['draft', false],
        ])->get();

        if($files->isEmpty()) {
            abort(404);
        }

        return redirect()->route('files.zip', ['id' => $files->pluck('id')->toArray(), 'name' => $files->first()->fileCategory->name]);
    }
}
