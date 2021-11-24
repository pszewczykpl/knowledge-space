<?php

namespace App\Http\Controllers;

use App\Models\SystemProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class SystemConfigurationController extends Controller
{
    public function switchDarkMode(Request $request)
    {
        $dark_mode = !session('dark_mode', config('view.default_dark_mode'));
        
        session()->put('dark_mode', $dark_mode);
        if(Auth::check()) {
            Auth::user()->v_dark_mode = $dark_mode;
            Auth::user()->save();
        }

        return redirect()->back();
    }
}
