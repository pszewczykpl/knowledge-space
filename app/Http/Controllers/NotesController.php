<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Investment;
use App\Models\Protective;
use App\Models\Employee;
use App\Models\Fund;
use App\Models\Partner;
use App\Models\Risk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class NotesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Note::class);

        return view('notes.index', [
            'title' => 'Notatki',
            'notes' => Note::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Note::class);
        
        return view('notes.create', [
            'title' => 'Nowa notatka',
            'description' => 'Uzupełnij dane notatki i kliknij Zapisz',
            'investments' => Investment::all(),
            'protectives' => Protective::all(),
            'employees' => Employee::all(),
            'funds' => Fund::all(),
            'partners' => Partner::all(),
            'risks' => Risk::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Note::class);
        
        $note = new Note($request->all());
        Auth::user()->notes()->save($note);
        
        $note->investments()->attach($request->investment_id);
        $note->protectives()->attach($request->protective_id);
        $note->employees()->attach($request->employee_id);
        $note->funds()->attach($request->fund_id);
        $note->partners()->attach($request->partner_id);
        $note->risks()->attach($request->risk_id);

        return redirect()->back()->with('notify_success', 'Nowa notatka została dodana!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return view('notes.show', [
            'title' => 'Szczegóły',
            'note' => $note,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        $this->authorize('update', $note);

        return view('notes.edit', [
            'title' => 'Edycja notatki',
            'description' => 'Zaktualizuj dane notatki i kliknij Zapisz',
            'note' => $note,
            'investments' => Investment::all(),
            'protectives' => Protective::all(),
            'employees' => Employee::all(),
            'funds' => Fund::all(),
            'partners' => Partner::all(),
            'risks' => Risk::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $this->authorize('update', $note);
        
        $note->update($request->all());

        $note->investments()->sync($request->investment_id);
        $note->protectives()->sync($request->protective_id);
        $note->employees()->sync($request->employee_id);
        $note->funds()->sync($request->fund_id);

        return redirect()->route('notes.show', $note->id)->with('notify_success', 'Dane notatki zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $this->authorize('delete', $note);
        $note->delete();

        return redirect()->route('notes.index')->with('notify_danger', 'Notatka została usunięta!');
    }
}
