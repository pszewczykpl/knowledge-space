<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProtectiveRequest;

use App\Protective;
use App\FileCategory;
use App\File;

class ProtectivesController extends Controller
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
     * Protectives.
     *
     * @return View
     */
    public function index() {
        return view('products.protectives.index', [
            'title' => 'Produkty Ochronne'
        ]);
    }
    
    /**
     * New Protective.
     *
     * @return View
     */
    public function create() {
        return view('products.protectives.create', [
            'title' => 'Dodaj nowy'
        ]);
    }
    
    /**
     * Store new Protective.
     */
    public function store(StoreProtectiveRequest $request) {
        $protective = new Protective($request->all());
        Auth::user()->protectives()->save($protective);

        Session::flash('notify_success', 'Udało się! Nowy komplet dokumentów został dodany!');
        return redirect()->route('protectives.show', $protective->id);
    }

    /**
     * Protective details.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id) {
        return view('products.protectives.show', [
            'title' => 'Szczegóły',
            'protective' => Protective::findOrFail($id),
        ]);
    }
    
    /**
     * Edit Protectives View.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id) {
        return view('products.protectives.edit', [
            'title' => 'Edytuj',
            'protective' => Protective::findOrFail($id)
        ]);
    }

    /**
     * Update Investment.
     *
     * @param  int  $id
     * @return View
     */
    public function update(StoreProtectiveRequest $request, $id) {
        $protective = Protective::findOrFail($id)
            ->update($request->all());

        Session::flash('notify_success', 'Zmiany w komplecie dokumentów zostały zapisane poprawnie!');
        return redirect()->route('protectives.show', $id);
    }

    /**
     * Delete Protective.
     *
     * @param  int  $id
     * @return View
     */
    public function destroy($id) {
        $protective = Protective::findOrFail($id)
            ->delete();

        Session::flash('notify_danger', 'Usunięto! Oby nie przypadkowo... :-)');
        return redirect()->route('protectives.index');
    }
}
