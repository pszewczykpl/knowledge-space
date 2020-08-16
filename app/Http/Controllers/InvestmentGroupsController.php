<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvestmentGroupsController extends Controller
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
     * Investments Groups View.
     *
     * @return View
     */
    public function index() {
        return view('investment-groups.index', [
            'title' => 'Grupy produktowe'
        ]);
    }
    
    /**
     * Investments Group detail View.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id) {
        return view('investment-groups.show', [
            'title' => 'Szczegóły',
            'fund' => Investment::findOrFail($id),
        ]);
    }
}
