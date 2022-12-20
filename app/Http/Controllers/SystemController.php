<?php

namespace App\Http\Controllers;

use App\Models\System;

use App\Http\Requests\StoreSystem;
use App\Http\Requests\UpdateSystem;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SystemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
        $this->authorizeResource(System::class, 'system');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('systems.index', [
            'title' => 'Systemy Towarzystwa Ubezpieczeń',
            'datatables' => System::getDatatablesData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('systems.create', [
            'title' => 'Nowy system Towarzystwa Ubezpieczeń',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSystem $request
     * @return RedirectResponse
     */
    public function store(StoreSystem $request): RedirectResponse
    {
        $system = new System($request->all());
        Auth::user()->systems()->save($system);

        return redirect()
            ->route('systems.show', $system)
            ->with('notify_success', 'Nowy system został dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param System $system
     * @return Application|Factory|View
     */
    public function show(System $system): View|Factory|Application
    {
        return view('systems.show', [
            'title' => 'Szczegóły',
            'system' => $system,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param System $system
     * @return Application|Factory|View
     */
    public function edit(System $system): View|Factory|Application
    {
        return view('systems.edit', [
            'title' => 'Edycja systemu Towarzystwa Ubezpieczeniowego',
            'system' => $system,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSystem $request
     * @param System $system
     * @return RedirectResponse
     */
    public function update(UpdateSystem $request, System $system): RedirectResponse
    {
        $system->update($request->all());

        return redirect()
            ->route('systems.show', $system)
            ->with('notify_success', 'Dane systemu zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param System $system
     * @return RedirectResponse
     */
    public function destroy(System $system): RedirectResponse
    {
        $system->delete();

        return redirect()
            ->route('systems.index')
            ->with('notify_danger', 'Dane systemu zostały usunięte!');
    }
}
