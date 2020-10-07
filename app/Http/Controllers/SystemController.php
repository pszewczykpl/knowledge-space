<?php

namespace App\Http\Controllers;

use App\Models\System;

use App\Http\Requests\StoreSystem;
use App\Http\Requests\UpdateSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SystemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('systems.index', [
            'title' => 'Systemy Towarzystwa Ubezpieczeń',
            'systems' => System::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', System::class);
        
        return view('systems.create', [
            'title' => 'Nowy system Towarzystwa Ubezpieczeń',
            'description' => 'Uzupełnij dane systemu i kliknij Zapisz',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreSystem  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSystem $request)
    {
        $this->authorize('create', System::class);
        
        $system = new System($request->all());
        Auth::user()->systems()->save($system);

        return redirect()->route('systems.show', $system->id)->with('notify_success', 'Nowy system został dodany!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function show(System $system)
    {
        return view('systems.show', [
            'title' => 'Szczegóły',
            'system' => $system,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function edit(System $system)
    {
        $this->authorize('update', $system);

        return view('systems.edit', [
            'title' => 'Edycja systemu Towarzystwa Ubezpieczeniowego',
            'description' => 'Zaktualizuj dane systemu i kliknij Zapisz',
            'system' => $system,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateSystem  $request
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSystem $request, System $system)
    {
        $this->authorize('update', $system);
        $system->update($request->all());

        return redirect()->route('systems.show', $system->id)->with('notify_success', 'Dane systemu zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function destroy(System $system)
    {
        $this->authorize('delete', $system);
        $system->delete();

        return redirect()->route('systems.index')->with('notify_danger', 'Dane systemu zostały usunięte!');
    }
}
