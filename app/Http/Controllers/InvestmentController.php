<?php

namespace App\Http\Controllers;

use App\Models\Investment;

use App\Http\Requests\StoreInvestment;
use App\Http\Requests\UpdateInvestment;
use App\Models\System;
use App\Models\SystemProperty;
use App\Jobs\StoreEvent;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class InvestmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['index', 'show']);
        $this->authorizeResource(Investment::class, 'investment');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('products.investments.index', [
            'title' => 'Ubezpieczenia Inwestycyjne',
            'datatables' => Investment::getDatatablesData()
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('products.investments.create', [
            'title' => 'Nowy produkt inwestycyjny',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreInvestment $request
     * @return RedirectResponse
     */
    public function store(StoreInvestment $request): RedirectResponse
    {
        $investment = new Investment($request->all());
        Auth::user()->investments()->save($investment);

        return redirect()
            ->route('investments.show', $investment)
            ->with('notify_success', 'Nowy produkt inwestycyjny został dodany!');
    }

    /**
     * Duplicate
     *
     * @param Investment $investment
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function duplicate(Investment $investment): RedirectResponse
    {
        $this->authorize('create', Investment::class);

        $newInvestment = $investment->replicate();
        // We set edit_date to default value (from system properties).
        $newInvestment->edit_date = SystemProperty::select('value')->where('key', 'default_edit_date')->firstOrFail()->pluck('value')[0];
        $newInvestment->save();

        $newInvestment->files()->attach($investment->files);
        $newInvestment->notes()->attach($investment->notes);
        $newInvestment->funds()->attach($investment->funds);

        $investment->status = 'N';
        $investment->save();

        return redirect()
            ->route('investments.show', $newInvestment)
            ->with('notify_success', 'Nowy produkt inwestycyjny został zduplikowany!');
    }

    /**
     * Display the specified resource.
     *
     * @param Investment $investment
     * @return View
     */
    public function show(Investment $investment): View
    {
        return view('products.investments.show', [
            'title' => 'Szczegóły',
            'investment' => $investment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Investment $investment
     * @return View
     */
    public function edit(Investment $investment): View
    {
        return view('products.investments.edit', [
            'title' => 'Edycja produktu inwestycyjnego',
            'investment' => $investment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateInvestment $request
     * @param Investment $investment
     * @return RedirectResponse
     */
    public function update(UpdateInvestment $request, Investment $investment): RedirectResponse
    {
        $investment->update($request->all());

        return redirect()
            ->route('investments.show', $investment)
            ->with('notify_success', 'Dane produktu inwestycyjnego zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Investment $investment
     * @return RedirectResponse
     */
    public function destroy(Investment $investment): RedirectResponse
    {
        $investment->delete();

        return redirect()
            ->route('investments.index')
            ->with('notify_danger', 'Produkt inwestycyjny został usunięty!');
    }
}
