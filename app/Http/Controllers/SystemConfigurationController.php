<?php

namespace App\Http\Controllers;

use App\Models\SystemProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SystemConfigurationController extends Controller
{
    public function switchDarkMode(Request $request)
    {
        $dark_mode = !session('dark_mode', config('view.default_dark_mode'));
        session()->put('dark_mode', $dark_mode);

        return redirect()->back();
    }
}
