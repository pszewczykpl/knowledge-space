<?php

namespace App\Http\Controllers;

use App\Models\Bancassurance;

use App\Http\Requests\StoreBancassurance;
use App\Http\Requests\UpdateBancassurance;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class BancassuranceController extends Controller
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
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('products.bancassurances.index', [
            'title' => 'Ubezpieczenia Bancassurance',
            'datatables' => Bancassurance::getDatatablesData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->authorize('create', Bancassurance::class);
        
        return view('products.bancassurances.create', [
            'title' => 'Nowy produkt bancassurance',
            'description' => 'Uzupełnij dane produktu i kliknij Zapisz',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBancassurance $request)
    {
        $this->authorize('create', Bancassurance::class);
        
        $bancassurance = new Bancassurance($request->all());
        Auth::user()->bancassurances()->save($bancassurance);

        return redirect()->route('bancassurances.show', $bancassurance->id)->with('notify_success', 'Nowy produkt bancassurance został dodany!');
    }

    /**
     * Duplicate a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreBancassurance  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function duplicate(Bancassurance $bancassurance)
    {
        $this->authorize('create', Bancassurance::class);

        $bancassurance->load('user');
        $clone = $bancassurance->replicate();
        $clone->save();
        $clone->files()->attach($bancassurance->files);
        $clone->notes()->attach($bancassurance->notes);

        return redirect()->route('bancassurances.show', $clone->id)->with('notify_success', 'Nowy produkt bancassurance został zduplikowany!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bancassurance  $bancassurance
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Bancassurance $bancassurance)
    {
        return view('products.bancassurances.show', [
            'title' => 'Szczegóły',
            'bancassurance' => $bancassurance,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bancassurance  $bancassurance
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Bancassurance $bancassurance)
    {
        $this->authorize('update', $bancassurance);

        return view('products.bancassurances.edit', [
            'title' => 'Edycja produktu bancassurance',
            'description' => 'Zaktualizuj dane produktu i kliknij Zapisz',
            'bancassurance' => Bancassurance::findOrFail($bancassurance->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bancassurance  $bancassurance
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBancassurance $request, Bancassurance $bancassurance)
    {
        $this->authorize('update', $bancassurance);
        $bancassurance->update($request->all());

        return redirect()->route('bancassurances.show', $bancassurance->id)->with('notify_success', 'Dane produktu bancassurance zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bancassurance  $bancassurance
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Bancassurance $bancassurance)
    {
        $this->authorize('delete', $bancassurance);
        $bancassurance->delete();

        return redirect()->route('bancassurances.index')->with('notify_danger', 'Produkt bancassurance został usunięty!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $bancassurance = Bancassurance::withTrashed()->findOrFail($id);

        $this->authorize('restore', $bancassurance);
        $bancassurance->restore();

        return redirect()->route('bancassurances.index')->with('notify_danger', 'Produkt bancassurance został przywrócony!');
    }

    /**
     * Force remove the specified resource from storage.
     *
     * @param  id  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function force_destroy($id)
    {
        $bancassurance = Bancassurance::withTrashed()->findOrFail($id);

        $this->authorize('forceDelete', $bancassurance);
        
        $bancassurance->forceDelete();

        return redirect()->route('bancassurances.index')->with('notify_danger', 'Produkt bancassurance został trwale usunięty!');
    }
}
