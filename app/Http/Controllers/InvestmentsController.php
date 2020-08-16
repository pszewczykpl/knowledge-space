<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInvestmentRequest;
use App\Http\Controllers\Controller;

use App\Investment;
use App\FileCategory;
use App\File;

class InvestmentsController extends Controller
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
        return view('products.investments.index', [
            'title' => 'Produkty Inwestycyjne',
            'investments' => Investment::all(),
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $this->authorize('create', Investment::class);

        return view('products.investments.create', [
            'title' => 'Nowy produkt inwestycyjny',
            'description' => 'Uzupełnij dane produktu i kliknij Zapisz',
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvestmentRequest $request) {
        $this->authorize('create', Investment::class);

        $investment = new Investment($request->all());
        Auth::user()->investments()->save($investment);

        return redirect()->route('investments.show', $investment->id)->with('notify_success', 'Udało się! Nowy komplet dokumentów został dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function show(Investment $investment) 
    {
        return view('products.investments.show', [
            'title' => 'Szczegóły',
            'investment' => $investment,
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function edit(Investment $investment) {
        $this->authorize('update', $investment);

        return view('products.investments.edit', [
            'title' => 'Edytuj',
            'description' => 'Produkt Inwestycyjny',
            'investment' => $investment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreInvestmentRequest  $request
     * @param  \App\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function update(StoreInvestmentRequest $request, Investment $investment) {
        $this->authorize('update', $investment);

        $investment->update($request->all());

        return redirect()->route('investments.show', $investment->id)->with('notify_success', 'Zmiany w komplecie dokumentów zostały zapisane poprawnie!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investment $investment) {
        $this->authorize('delete', $investment);

        $investment->delete();

        return redirect()->route('investments.index')->with('notify_danger', 'Usunięto! Oby nie przypadkowo... :-)');
    }
}
