<?php

namespace App\Http\Controllers;

use App\Models\Partner;

use App\Http\Requests\StorePartner;
use App\Http\Requests\UpdatePartner;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PartnerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->authorizeResource(Partner::class, 'partner');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('partners.index', [
            'title' => 'Partnerzy',
            'datatables' => Partner::getDatatablesData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('partners.create', [
            'title' => 'Nowy partner',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePartner $request
     * @return RedirectResponse
     */
    public function store(StorePartner $request): RedirectResponse
    {
        $partner = new Partner($request->all());
        Auth::user()->partners()->save($partner);

        return redirect()
            ->route('partners.show', $partner)
            ->with('notify_success', 'Nowy partner został dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param Partner $partner
     * @return Application|Factory|View
     */
    public function show(Partner $partner): View|Factory|Application
    {
        return view('partners.show', [
            'title' => 'Szczegóły',
            'partner' => $partner,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Partner $partner
     * @return Application|Factory|View
     */
    public function edit(Partner $partner): View|Factory|Application
    {
        return view('partners.edit', [
            'title' => 'Edycja partnera',
            'partner' => $partner,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePartner $request
     * @param Partner $partner
     * @return RedirectResponse
     */
    public function update(UpdatePartner $request, Partner $partner): RedirectResponse
    {
        $partner->update($request->all());

        return redirect()
            ->route('partners.show', $partner)
            ->with('notify_success', 'Dane partnera zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Partner $partner
     * @return RedirectResponse
     */
    public function destroy(Partner $partner): RedirectResponse
    {
        $partner->delete();

        return redirect()
            ->route('partners.index')
            ->with('notify_danger', 'Partner został usunięty!');
    }
}
