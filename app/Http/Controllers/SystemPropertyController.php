<?php

namespace App\Http\Controllers;

use App\Models\SystemProperty;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
        $this->authorizeResource(SystemProperty::class, SystemProperty::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('properties.index', [
            'title' => 'Parametry systemu',
            'default_edit_date' => SystemProperty::find('default_edit_date'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        foreach(SystemProperty::$properties as $key) {
            $systemProperty = SystemProperty::find($key);
            $systemProperty->value = $request->{$key};
            $systemProperty->save();
        }

        return redirect()
            ->route('system-properties.index')
            ->with('notify_success', 'Parametry systemu zostały zaktualizowane!');
    }

    /**
     * Set app to maintenance mode on.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function maintenance_on(Request $request): RedirectResponse
    {
        Artisan::call('down', [
            '--render' => 'errors::maintenance',
            '--secret' => 'deployment'
        ]);

        return redirect()
            ->route('system-properties.index')
            ->with('notify_success', 'System znajduje się w trybie Maintenance!');
    }

    /**
     * Set app to maintenance mode off.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function maintenance_off(Request $request): RedirectResponse
    {
        Artisan::call('up');

        return redirect()
            ->route('system-properties.index')
            ->with('notify_success', 'Tryb Maintenance został wyłączony!');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function switchDarkMode(Request $request): RedirectResponse
    {
        $dark_mode = !session('dark_mode', config('view.default_dark_mode'));
        session()->put('dark_mode', $dark_mode);

        return redirect()
            ->back()
            ->with('notify_success', $dark_mode ? 'Tryb ciemny włączony' : 'Tryb ciemny wyłączony');
    }
}
