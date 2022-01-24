<?php

namespace App\Http\Controllers;

use App\Models\Risk;

use App\Http\Requests\StoreRisk;
use App\Http\Requests\UpdateRisk;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RiskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->authorizeResource(Risk::class, 'risk');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('risks.index', [
            'title' => 'Ryzyka ubezpieczeniowe',
            'datatables' => Risk::getDatatablesData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('risks.create', [
            'title' => 'Nowe ryzyko ubezpieczeniowe',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRisk $request
     * @return RedirectResponse
     */
    public function store(StoreRisk $request): RedirectResponse
    {
        $risk = new Risk($request->all());
        Auth::user()->risks()->save($risk);

        return redirect()
            ->route('risks.show', $risk)
            ->with('notify_success', 'Nowe ryzyko ubezpieczeniowe zostało dodane!');
    }

    /**
     * Display the specified resource.
     *
     * @param Risk $risk
     * @return Application|Factory|View
     */
    public function show(Risk $risk): View|Factory|Application
    {
        return view('risks.show', [
            'title' => 'Szczegóły',
            'risk' => $risk,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Risk $risk
     * @return Application|Factory|View
     */
    public function edit(Risk $risk): Application|Factory|View
    {
        return view('risks.edit', [
            'title' => 'Edycja ryzyka ubezpieczeniowego',
            'risk' => $risk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRisk $request
     * @param Risk $risk
     * @return RedirectResponse
     */
    public function update(UpdateRisk $request, Risk $risk): RedirectResponse
    {
        $risk->update($request->all());

        return redirect()
            ->route('risks.show', $risk)
            ->with('notify_success', 'Dane ryzyka ubezpieczeniowego zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Risk $risk
     * @return RedirectResponse
     */
    public function destroy(Risk $risk): RedirectResponse
    {
        $risk->delete();

        return redirect()
            ->route('risks.index')
            ->with('notify_danger', 'Ryzyko ubezpieczeniowe zostało usunięte!');
    }
}
