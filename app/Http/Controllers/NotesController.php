<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\Permissions;

use App\Note;
use App\Investment;
use App\Protective;
use App\Employee;

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

        return view('admin.notes.index', [
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
        
        return view('admin.notes.create', [
            'title' => 'Dodaj nowy',
            'description' => 'Notatka',
            'investments' => Investment::all(),
            'protectives' => Protective::all(),
            'employees' => Employee::all(),
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

        return redirect()->back()->with('notify_success', 'Udało się! Nowy komentarz został dodany!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        $this->authorize('update', $note);

        return view('admin.notes.edit', [
            'title' => 'Edytuj',
            'description' => 'Komentarz',
            'comment' => Note::findOrFail($note->id),
            'investments' => Investment::all(),
            'protectives' => Protective::all(),
            'employees' => Employee::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $this->authorize('update', $note);

        $user = Note::findOrFail($note->id)
            ->update($request->all());

        $note->investments()->sync($request->investment_id);
        $note->protectives()->sync($request->protective_id);
        $note->employees()->sync($request->employee_id);

        Session::flash('notify_success', 'Zmiany na użytkowniku zostały zapisane poprawnie!');
        return redirect()->route('notes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $this->authorize('delete', $note);

        $note->delete();

        Session::flash('notify_danger', 'Usunięto! Oby nie przypadkowo... :-)');
        return redirect()->back();
    }
}
