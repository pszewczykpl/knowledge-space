<?php

namespace App\Http\Controllers;

use App\Jobs\StoreEvent;
use App\Models\Protective;

use App\Http\Requests\StoreProtective;
use App\Http\Requests\UpdateProtective;

use App\Http\Controllers\Controller;
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
        $this->authorizeResource(Protective::class, 'protective');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('products.protectives.index', [
            'title' => 'Ubezpieczenia Ochronne',
            'datatables' => Protective::getDatatablesData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('products.protectives.create', [
            'title' => 'Nowy produkt ochronny',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProtective $request
     * @return RedirectResponse
     */
    public function store(StoreProtective $request): RedirectResponse
    {
        $protective = new Protective($request->all());
        Auth::user()->protectives()->save($protective);

        return redirect()
            ->route('protectives.show', $protective)
            ->with('notify_success', 'Nowy produkt ochronny został dodany!');
    }

    /**
     * Duplicate a newly created resource in storage.
     *
     * @param Protective $protective
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function duplicate(Protective $protective): RedirectResponse
    {
        $this->authorize('create', Protective::class);

        $newProtective = $protective->replicate();
        $newProtective->save();
        $newProtective->files()->attach($protective->files);
        $newProtective->notes()->attach($protective->notes);

        return redirect()
            ->route('protectives.show', $newProtective)
            ->with('notify_success', 'Nowy produkt ochronny został zduplikowany!');
    }

    /**
     * Display the specified resource.
     *
     * @param Protective $protective
     * @return Application|Factory|View
     */
    public function show(Protective $protective): View|Factory|Application
    {
        $history = Cache::remember("protectives:$protective->id:history", 60*60*12, function () use ($protective) {
            return Protective::where('code', '=', $protective->code)
                ->where('dist_short', '=', $protective->dist_short)
                ->where('code_owu', '=', $protective->code_owu)
                ->orderBy('edit_date', 'desc')->get();
        });

        return view('products.protectives.show', [
            'title' => 'Szczegóły',
            'protective' => $protective,
            'archive_protectives' => $history,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Protective $protective
     * @return Application|Factory|View
     */
    public function edit(Protective $protective): View|Factory|Application
    {
        return view('products.protectives.edit', [
            'title' => 'Edycja produktu ochronnego',
            'protective' => $protective,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProtective $request
     * @param Protective $protective
     * @return RedirectResponse
     */
    public function update(UpdateProtective $request, Protective $protective): RedirectResponse
    {
        $protective->update($request->all());

        return redirect()
            ->route('protectives.show', $protective)
            ->with('notify_success', 'Dane produktu ochronnego zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Protective $protective
     * @return RedirectResponse
     */
    public function destroy(Protective $protective): RedirectResponse
    {
        $protective->delete();

        return redirect()
            ->route('protectives.index')
            ->with('notify_danger', 'Produkt ochronny został usunięty!');
    }
}
