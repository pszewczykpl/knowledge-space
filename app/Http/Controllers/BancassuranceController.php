<?php

namespace App\Http\Controllers;

use App\Jobs\StoreEvent;
use App\Models\Bancassurance;

use App\Http\Requests\StoreBancassurance;
use App\Http\Requests\UpdateBancassurance;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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
        $this->authorizeResource(Bancassurance::class, 'bancassurance');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('products.bancassurances.index', [
            'title' => 'Ubezpieczenia Bancassurance',
            'datatables' => Bancassurance::getDatatablesData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('products.bancassurances.create', [
            'title' => 'Nowy produkt bancassurance',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBancassurance $request
     * @return RedirectResponse
     */
    public function store(StoreBancassurance $request): RedirectResponse
    {
        $bancassurance = new Bancassurance($request->all());
        Auth::user()->bancassurances()->save($bancassurance);

        return redirect()
            ->route('bancassurances.show', $bancassurance)
            ->with('notify_success', 'Nowy produkt bancassurance został dodany!');
    }

    /**
     * Duplicate a newly created resource in storage.
     *
     * @param Bancassurance $bancassurance
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function duplicate(Bancassurance $bancassurance): RedirectResponse
    {
        $this->authorize('create', Bancassurance::class);

        $newBancassurance = $bancassurance->replicate();
        $newBancassurance->save();
        $newBancassurance->files()->attach($bancassurance->files);
        $newBancassurance->notes()->attach($bancassurance->notes);

        return redirect()
            ->route('bancassurances.show', $newBancassurance)
            ->with('notify_success', 'Nowy produkt bancassurance został zduplikowany!');
    }

    /**
     * Display the specified resource.
     *
     * @param Bancassurance $bancassurance
     * @return View
     */
    public function show(Bancassurance $bancassurance): View
    {
        return view('products.bancassurances.show', [
            'title' => 'Szczegóły',
            'bancassurance' => $bancassurance,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bancassurance $bancassurance
     * @return View
     */
    public function edit(Bancassurance $bancassurance): View
    {
        return view('products.bancassurances.edit', [
            'title' => 'Edycja produktu bancassurance',
            'bancassurance' => $bancassurance,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBancassurance $request
     * @param Bancassurance $bancassurance
     * @return RedirectResponse
     */
    public function update(UpdateBancassurance $request, Bancassurance $bancassurance): RedirectResponse
    {
        $bancassurance->update($request->all());

        return redirect()
            ->route('bancassurances.show', $bancassurance)
            ->with('notify_success', 'Dane produktu bancassurance zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bancassurance $bancassurance
     * @return RedirectResponse
     */
    public function destroy(Bancassurance $bancassurance): RedirectResponse
    {
        $bancassurance->delete();

        return redirect()
            ->route('bancassurances.index')
            ->with('notify_danger', 'Produkt bancassurance został usunięty!');
    }
}
