<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Fund;

class FundsController extends Controller
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
     * Funds View.
     *
     * @return View
     */
    public function index() {
        return view('funds.index', [
            'title' => 'Ubezpieczeniowe Fundusze Kapitałowe'
        ]);
    }
    
    /**
     * Fund detail View.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id) {
        return view('funds.show', [
            'title' => 'Szczegóły',
            'fund' => Investment::findOrFail($id),
        ]);
    }
}
