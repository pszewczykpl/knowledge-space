<?php

namespace App\Http\Controllers;

use App\Models\Risk;

use App\Http\Requests\StoreRisk;
use App\Http\Requests\UpdateRisk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('risks.index', [
            'title' => 'Ryzyka ubezpieczeniowe',
            'datatables' => Risk::getDatatablesData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Risk::class);
        
        return view('risks.create', [
            'title' => 'Nowe ryzyko ubezpieczeniowe',
            'description' => 'Uzupełnij dane ryzyka i kliknij Zapisz',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRisk $request)
    {
        $this->authorize('create', Risk::class);
        
        $risk = new Risk($request->all());
        Auth::user()->risks()->save($risk);

        return redirect()->route('risks.show', $risk->id)->with('notify_success', 'Nowe ryzyko ubezpieczeniowe zostało dodane!');
    }

    /**
     * Duplicate a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Risk  $request
     * @return \Illuminate\Http\Response
     */
    public function duplicate(Risk $risk)
    {
        $this->authorize('create', Risk::class);

        $risk->load('user');
        $clone = $risk->replicate();
        $clone->save();
        $clone->notes()->attach($risk->notes);

        return redirect()->route('risks.show', $clone->id)->with('notify_success', 'Nowe ryzyko zostało zduplikowany!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Risk  $risk
     * @return \Illuminate\Http\Response
     */
    public function show(Risk $risk) 
    {
        return view('risks.show', [
            'title' => 'Szczegóły',
            'risk' => $risk,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Risk  $risk
     * @return \Illuminate\Http\Response
     */
    public function edit(Risk $risk)
    {
        $this->authorize('update', $risk);

        return view('risks.edit', [
            'title' => 'Edycja ryzyka ubezpieczeniowego',
            'description' => 'Zaktualizuj dane ryzyka i kliknij Zapisz',
            'risk' => Risk::findOrFail($risk->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Risk  $risk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRisk $request, Risk $risk)
    {
        $this->authorize('update', $risk);
        $risk->update($request->all());

        return redirect()->route('risks.show', $risk->id)->with('notify_success', 'Dane ryzyka ubezpieczeniowego zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Risk  $risk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Risk $risk)
    {
        $this->authorize('delete', $risk);
        $risk->delete();

        return redirect()->route('risks.index')->with('notify_danger', 'Ryzyko ubezpieczeniowe zostało usunięte!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $risk = Risk::withTrashed()->findOrFail($id);

        $this->authorize('restore', $risk);
        $risk->restore();

        return redirect()->route('risks.index')->with('notify_danger', 'Ryzyko zostało przywrócone!');
    }

    /**
     * Force remove the specified resource from storage.
     *
     * @param  id  $id
     * @return \Illuminate\Http\Response
     */
    public function force_destroy($id)
    {
        $risk = Risk::withTrashed()->findOrFail($id);

        $this->authorize('forceDelete', $risk);
        $risk->forceDelete();

        return redirect()->route('risks.index')->with('notify_danger', 'Ryzyko zostało trwale usunięte!');
    }
}
