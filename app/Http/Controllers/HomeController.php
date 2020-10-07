<?php

namespace App\Http\Controllers;

use App\Models\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index', [
            'title' => 'Strona główna',
            'systems' => System::all(),
            'name' => config('app.name'),
        ]);
    }
}
