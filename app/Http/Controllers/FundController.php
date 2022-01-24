<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use App\Models\Investment;

use App\Http\Requests\StoreFund;
use App\Http\Requests\UpdateFund;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FundController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->authorizeResource(Fund::class, 'fund');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('funds.index', [
            'title' => 'Ubezpieczeniowe Fundusze Kapitałowe',
            'datatables' => Fund::getDatatablesData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('funds.create', [
            'title' => 'Nowy fundusz UFK',
            'investments' => Investment::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFund $request
     * @return RedirectResponse
     */
    public function store(StoreFund $request): RedirectResponse
    {
        $fund = new Fund($request->all());
        Auth::user()->funds()->save($fund);
        $fund->investments()->attach($request->investment_id);

        return redirect()
            ->route('funds.show', $fund)
            ->with('notify_success', 'Nowy fundusz UFK został dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param Fund $fund
     * @return Application|Factory|View
     */
    public function show(Fund $fund): View|Factory|Application
    {
        return view('funds.show', [
            'title' => 'Szczegóły',
            'fund' => $fund,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Fund $fund
     * @return View
     */
    public function edit(Fund $fund): View
    {
        return view('funds.edit', [
            'title' => 'Edycja funduszu UFK',
            'fund' => $fund,
            'investments' => Investment::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFund $request
     * @param Fund $fund
     * @return RedirectResponse
     */
    public function update(UpdateFund $request, Fund $fund): RedirectResponse
    {
        $fund->update($request->all());
        $fund->investments()->sync($request->investment_id);

        return redirect()
            ->route('funds.show', $fund)
            ->with('notify_success', 'Dane funduszu UFK zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Fund $fund
     * @return RedirectResponse
     */
    public function destroy(Fund $fund): RedirectResponse
    {
        $fund->delete();

        return redirect()
            ->route('funds.index')
            ->with('notify_danger', 'Fundusz UFK został usunięty!');
    }
}
