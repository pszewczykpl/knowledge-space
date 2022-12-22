<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Investment;
use App\Models\Protective;
use App\Models\Bancassurance;
use App\Models\Employee;
use App\Models\Fund;
use App\Models\Partner;
use App\Models\Risk;

use App\Http\Requests\StoreNote;
use App\Http\Requests\UpdateNote;

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

class NoteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
        $this->authorizeResource(Note::class, 'note');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('notes.index', [
            'title' => 'Notatki',
            'datatables' => Note::getDatatablesData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('notes.create', [
            'title' => 'Nowa notatka',
            'investments' => Investment::all(),
            'protectives' => Protective::all(),
            'bancassurances' => Bancassurance::all(),
            'employees' => Employee::all(),
            'funds' => Fund::all(),
            'partners' => Partner::all(),
            'risks' => Risk::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreNote $request
     * @return RedirectResponse
     */
    public function store(StoreNote $request): RedirectResponse
    {
        $note = new Note($request->all());
        Auth::user()->notes()->save($note);

        $note->investments()->attach($request->investment_id);
        $note->protectives()->attach($request->protective_id);
        $note->bancassurances()->attach($request->bancassurance_id);
        $note->employees()->attach($request->employee_id);
        $note->partners()->attach($request->partner_id);
        $note->risks()->attach($request->risk_id);
        $note->funds()->attach($request->fund_id);

        return redirect()
            ->back()
            ->with('notify_success', 'Nowa notatka została dodana!');
    }

    /**
     * Display the specified resource.
     *
     * @param Note $note
     * @return Application|Factory|View
     */
    public function show(Note $note): View|Factory|Application
    {
        return view('notes.show', [
            'title' => 'Szczegóły',
            'note' => $note,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Note $note
     * @return Application|Factory|View
     */
    public function edit(Note $note): View|Factory|Application
    {
        return view('notes.edit', [
            'title' => 'Edycja notatki',
            'note' => $note,
            'investments' => Investment::all(),
            'protectives' => Protective::all(),
            'bancassurances' => Bancassurance::all(),
            'employees' => Employee::all(),
            'funds' => Fund::all(),
            'partners' => Partner::all(),
            'risks' => Risk::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNote $request
     * @param Note $note
     * @return RedirectResponse
     */
    public function update(UpdateNote $request, Note $note): RedirectResponse
    {
        $note->update($request->all());
        
        $note->investments()->sync($request->investment_id);
        $note->protectives()->sync($request->protective_id);
        $note->bancassurances()->sync($request->bancassurance_id);
        $note->employees()->sync($request->employee_id);
        $note->partners()->sync($request->partner_id);
        $note->risks()->sync($request->risk_id);
        $note->funds()->sync($request->fund_id);

        return redirect()
            ->route('notes.show', $note)
            ->with('notify_success', 'Dane notatki zostały zaktualizowane!');
    }

    /**
     * Detach the specified resource from storage.
     *
     * @param Note $note
     * @param string $noteable_type
     * @param string $noteable_id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function detach(Note $note, string $noteable_type, string $noteable_id): RedirectResponse
    {
        $this->authorize('update', $note);

        $note->{$noteable_type . 's'}()->detach($noteable_id);
        $note->save();

        return redirect()
            ->back()
            ->with('notify_danger', 'Notatka została odpięta od produktu!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Note $note
     * @return RedirectResponse
     */
    public function destroy(Note $note): RedirectResponse
    {
        $note->delete();

        return redirect()
            ->route('notes.index')
            ->with('notify_danger', 'Notatka została usunięta!');
    }
}
