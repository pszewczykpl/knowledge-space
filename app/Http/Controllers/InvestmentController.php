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
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('products.investments.index', [
            'title' => 'Ubezpieczenia Inwestycyjne',
            'datatables' => Investment::getDatatablesData()
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create() 
    {
        $this->authorize('create', Investment::class);

        return view('products.investments.create', [
            'title' => 'Nowy produkt inwestycyjny',
            'description' => 'Uzupełnij dane produktu i kliknij Zapisz',
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreInvestment  $request
     * @return Response
     */
    public function store(StoreInvestment $request) 
    {
        $this->authorize('create', Investment::class);

        $investment = new Investment($request->all());
        Auth::user()->investments()->save($investment);

        // Store event using job
        StoreEvent::dispatch('store', $investment);

        return redirect()->route('investments.show', $investment->id)->with('notify_success', 'Nowy produkt inwestycyjny został dodany!');
    }

    /**
     * Duplicate
     *
     * @param  \Illuminate\Http\StoreInvestment  $request
     * @return Response
     */
    public function duplicate(Investment $investment)
    {
        $this->authorize('create', Investment::class);

        $investment->load('user');
        $clone = $investment->replicate();
        $clone->edit_date = SystemProperty::select('value')->where('key', 'default_edit_date')->firstOrFail()->pluck('value')[0];
        $clone->save();
        $clone->files()->attach($investment->files);
        $clone->notes()->attach($investment->notes);
        $clone->funds()->attach($investment->funds);

        $investment->status = 'N';
        $investment->save();

        // Store event using job
        StoreEvent::dispatch('duplicate', $investment);

        return redirect()->route('investments.show', $clone->id)->with('notify_success', 'Nowy produkt inwestycyjny został zduplikowany!');
    }

    /**
     * Display the specified resource.
     *
     * @param Investment $investment
     * @return Application|Factory|View
     */
    public function show(Investment $investment)
    {
        $history = Cache::remember("investments:$investment->id:history", 60*60*12, function () use ($investment) {
            return Investment::where('code_toil', '=', $investment->code_toil)->orderBy('edit_date', 'desc')->get();
        });

        StoreEvent::dispatch('show', $investment);
        return view('products.investments.show', [
            'title' => 'Szczegóły',
            'investment' => $investment,
            'archive_investments' => $history,
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Investment  $investment
     * @return Response
     */
    public function edit(Investment $investment) 
    {
        $this->authorize('update', $investment);

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
     * @throws AuthorizationException
     */
    public function update(UpdateInvestment $request, Investment $investment) 
    {
        $this->authorize('update', $investment);

        $investment->update($request->all());

        // Store event using job
        StoreEvent::dispatch('update', $investment);

        return redirect()->route('investments.show', $investment)->with('notify_success', 'Dane produktu inwestycyjnego zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Investment  $investment
     * @return Response
     */
    public function destroy(Investment $investment) 
    {
        $this->authorize('delete', $investment);
        $investment->delete();

        // Store event using job
        StoreEvent::dispatch('destroy', $investment);

        return redirect()->route('investments.index')->with('notify_danger', 'Produkt inwestycyjny został usunięty!');
    }
}
