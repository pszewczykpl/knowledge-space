<?php

namespace App\Http\Controllers;

use App\Models\Bancassurance;
use App\Models\Employee;

use App\Http\Requests\StoreEmployee;
use App\Http\Requests\UpdateEmployee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
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
        return view('products.employees.index', [
            'title' => 'Ubezpieczenia Pracownicze',
            'datatables' => Employee::getDatatablesData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Employee::class);
        
        return view('products.employees.create', [
            'title' => 'Nowy produkt pracowniczy',
            'description' => 'Uzupełnij dane produktu i kliknij Zapisz',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreEmployee  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {
        $this->authorize('create', Employee::class);
        
        $employee = new Employee($request->all());
        Auth::user()->employees()->save($employee);

        return redirect()->route('employees.show', $employee->id)->with('notify_success', 'Nowy produkt pracowniczy został dodany!');
    }

    /**
     * Duplicate a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreEmployee  $request
     * @return \Illuminate\Http\Response
     */
    public function duplicate(Employee $employee)
    {
        $this->authorize('create', Employee::class);

        $employee->load('user');
        $clone = $employee->replicate();
        $clone->save();
        $clone->files()->attach($employee->files);
        $clone->notes()->attach($employee->notes);

        return redirect()->route('employees.show', $clone->id)->with('notify_success', 'Nowy produkt pracowniczy został zduplikowany!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('products.employees.show', [
            'title' => 'Szczegóły',
            'employee' => $employee,
            'archive_employees' => Employee::where('name', '=', $employee->name)->orderBy('edit_date', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $this->authorize('update', $employee);

        return view('products.employees.edit', [
            'title' => 'Edycja produktu pracowniczego',
            'description' => 'Zaktualizuj dane produktu i kliknij Zapisz',
            'employee' => Employee::findOrFail($employee->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateEmployee  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployee $request, Employee $employee)
    {
        $this->authorize('update', $employee);
        $employee->update($request->all());

        return redirect()->route('employees.show', $employee->id)->with('notify_success', 'Dane produktu pracowniczego zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $this->authorize('delete', $employee);
        $employee->delete();

        return redirect()->route('employees.index')->with('notify_danger', 'Produkt pracowniczy został usunięty!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $employee = Employee::withTrashed()->findOrFail($id);

        $this->authorize('restore', $employee);
        $employee->restore();

        return redirect()->route('employees.index')->with('notify_danger', 'Produkt pracowniczy został przywrócony!');
    }

    /**
     * Force remove the specified resource from storage.
     *
     * @param  id  $id
     * @return \Illuminate\Http\Response
     */
    public function force_destroy($id)
    {
        $employee = Employee::withTrashed()->findOrFail($id);

        $this->authorize('forceDelete', $employee);
        
        $employee->forceDelete();

        return redirect()->route('employees.index')->with('notify_danger', 'Produkt pracowniczy został trwale usunięty!');
    }
}
