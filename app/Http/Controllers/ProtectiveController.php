<?php

namespace App\Http\Controllers;

use App\Jobs\StoreEvent;
use App\Models\Protective;

use App\Http\Requests\StoreProtective;
use App\Http\Requests\UpdateProtective;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class ProtectiveController extends Controller
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
        return view('products.protectives.index', [
            'title' => 'Ubezpieczenia Ochronne',
            'datatables' => Protective::getDatatablesData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Protective::class);
        
        return view('products.protectives.create', [
            'title' => 'Nowy produkt ochronny',
            'description' => 'Uzupełnij dane produktu i kliknij Zapisz',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProtective $request)
    {
        $this->authorize('create', Protective::class);
        
        $protective = new Protective($request->all());
        Auth::user()->protectives()->save($protective);

        return redirect()->route('protectives.show', $protective->id)->with('notify_success', 'Nowy produkt ochronny został dodany!');
    }

    /**
     * Duplicate a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreProtective  $request
     * @return \Illuminate\Http\Response
     */
    public function duplicate(Protective $protective)
    {
        $this->authorize('create', Protective::class);

        $protective->load('user');
        $clone = $protective->replicate();
        $clone->save();
        $clone->files()->attach($protective->files);
        $clone->notes()->attach($protective->notes);

        return redirect()->route('protectives.show', $clone->id)->with('notify_success', 'Nowy produkt ochronny został zduplikowany!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Protective  $protective
     * @return \Illuminate\Http\Response
     */
    public function show(Protective $protective)
    {
        $history = Cache::remember("protectives:$protective->id:history", 60*60*12, function () use ($protective) {
            return Protective::where('code', '=', $protective->code)
                ->where('dist_short', '=', $protective->dist_short)
                ->where('code_owu', '=', $protective->code_owu)
                ->orderBy('edit_date', 'desc')->get();
        });

        StoreEvent::dispatch('show', $protective);
        return view('products.protectives.show', [
            'title' => 'Szczegóły',
            'protective' => $protective,
            'archive_protectives' => $history,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Protective  $protective
     * @return \Illuminate\Http\Response
     */
    public function edit(Protective $protective)
    {
        $this->authorize('update', $protective);

        return view('products.protectives.edit', [
            'title' => 'Edycja produktu ochronnego',
            'description' => 'Zaktualizuj dane produktu i kliknij Zapisz',
            'protective' => Protective::findOrFail($protective->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Protective  $protective
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProtective $request, Protective $protective)
    {
        $this->authorize('update', $protective);
        $protective->update($request->all());

        return redirect()->route('protectives.show', $protective->id)->with('notify_success', 'Dane produktu ochronnego zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Protective  $protective
     * @return \Illuminate\Http\Response
     */
    public function destroy(Protective $protective)
    {
        $this->authorize('delete', $protective);
        $protective->delete();

        return redirect()->route('protectives.index')->with('notify_danger', 'Produkt ochronny został usunięty!');
    }
}
