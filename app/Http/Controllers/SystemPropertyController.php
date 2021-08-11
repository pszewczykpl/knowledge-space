<?php

namespace App\Http\Controllers;

use App\Models\SystemProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SystemPropertyController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', SystemProperty::class);

        return view('properties.index', [
            'title' => 'Parametry systemu',
            'default_edit_date' => SystemProperty::where('key', '=', 'default_edit_date')->firstOrFail()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->authorize('update', SystemProperty::class);

        $default_edit_date = SystemProperty::where('key', '=', 'default_edit_date')->firstOrFail();
        $default_edit_date->value = $request->default_edit_date;
        $default_edit_date->save();

        return redirect()->route('system-properties.index')->with('notify_success', 'Parametry systemu zostały zaktualizowane!');
    }

    /**
     * Updating version of the app from git.
     *
     * @param Request $request
     */
    public function getNewAppVersionFromGit(Request $request)
    {
        Artisan::call('down', [
            '--render' => 'errors::maintenance',
            '--secret' => 'deployment'
        ]);
        shell_exec('git fetch --all');
        shell_exec('git reset --hard origin/master');
        shell_exec('php ../composer.phar update --optimize-autoloader --no-dev');
        Artisan::call('app:refresh');
        Artisan::call('up');

        return redirect()->route('system-properties.index')->with('notify_success', 'Aktualizacja systemu przebiegła pomyślnie!');
    }
}
