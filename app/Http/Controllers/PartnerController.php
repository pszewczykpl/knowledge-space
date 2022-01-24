<?php

namespace App\Http\Controllers;

use App\Models\Partner;

use App\Http\Requests\StorePartner;
use App\Http\Requests\UpdatePartner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('partners.index', [
            'title' => 'Partnerzy',
            'datatables' => Partner::getDatatablesData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Partner::class);
        
        return view('partners.create', [
            'title' => 'Nowy partner',
            'description' => 'Uzupełnij dane partnera i kliknij Zapisz',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartner $request)
    {
        $this->authorize('create', Partner::class);
        
        $partner = new Partner($request->all());
        Auth::user()->partners()->save($partner);

        return redirect()->route('partners.show', $partner->id)->with('notify_success', 'Nowy partner został dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner) 
    {
        return view('partners.show', [
            'title' => 'Szczegóły',
            'partner' => $partner,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        $this->authorize('update', $partner);

        return view('partners.edit', [
            'title' => 'Edycja partnera',
            'description' => 'Zaktualizuj dane partnera i kliknij Zapisz',
            'partner' => Partner::findOrFail($partner->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePartner $request, Partner $partner)
    {
        $this->authorize('update', $partner);
        $partner->update($request->all());

        return redirect()->route('partners.show', $partner->id)->with('notify_success', 'Dane partnera zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $this->authorize('delete', $partner);
        $partner->delete();

        return redirect()->route('partners.index')->with('notify_danger', 'Partner został usunięty!');
    }
}
