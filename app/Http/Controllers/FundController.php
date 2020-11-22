<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use App\Models\Investment;

use App\Http\Requests\StoreFund;
use App\Http\Requests\UpdateFund;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('funds.index', [
            'title' => 'Ubezpieczeniowe Fundusze Kapitałowe',
            'funds' => Fund::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Fund::class);
        
        return view('funds.create', [
            'title' => 'Nowy fundusz UFK',
            'description' => 'Uzupełnij dane funduszu i kliknij Zapisz',
            'investments' => Investment::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFund $request)
    {
        $this->authorize('create', Fund::class);
        
        $fund = new Fund($request->all());
        Auth::user()->funds()->save($fund);

        $fund->investments()->attach($request->investment_id);

        return redirect()->route('funds.show', $fund->id)->with('notify_success', 'Nowy fundusz UFK został dodany!');
    }

    /**
     * Duplicate a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Fund  $request
     * @return \Illuminate\Http\Response
     */
    public function duplicate(Fund $fund)
    {
        $this->authorize('create', Fund::class);

        $fund->load('user');
        $clone = $fund->replicate();
        $clone->save();
        $clone->notes()->attach($fund->notes);

        return redirect()->route('funds.show', $clone->id)->with('notify_success', 'Nowy fundusz został zduplikowany!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function show(Fund $fund)
    {
        return view('funds.show', [
            'title' => 'Szczegóły',
            'fund' => $fund,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function edit(Fund $fund)
    {
        $this->authorize('update', $fund);

        return view('funds.edit', [
            'title' => 'Edycja funduszu UFK',
            'description' => 'Zaktualizuj dane funduszu i kliknij Zapisz',
            'fund' => $fund,
            'investments' => Investment::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFund $request, Fund $fund)
    {
        $this->authorize('update', $fund);
        $fund->update($request->all());

        $fund->investments()->sync($request->investment_id);

        return redirect()->route('funds.show', $fund->id)->with('notify_success', 'Dane funduszu UFK zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fund $fund)
    {
        $this->authorize('delete', $fund);
        $fund->delete();

        return redirect()->route('funds.index')->with('notify_danger', 'Fundusz UFK został usunięty!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $fund = Fund::withTrashed()->findOrFail($id);

        $this->authorize('restore', $fund);
        $fund->restore();

        return redirect()->route('funds.index')->with('notify_danger', 'Fundusz UFK został przywrócony!');
    }
}
