<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RisksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    
    /**
     * Risks View.
     *
     * @return View
     */
    public function index() {
        return view('risks.index', [
            'title' => 'Ryzyka ubezpieczeniowe'
        ]);
    }
    
    /**
     * Risk detail View.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id) {
        return view('risks.show', [
            'title' => 'Szczegóły',
            'fund' => Risk::findOrFail($id),
        ]);
    }
}
