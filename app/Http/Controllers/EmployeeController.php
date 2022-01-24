<?php

namespace App\Http\Controllers;

use App\Jobs\StoreEvent;
use App\Models\Employee;
use App\Http\Requests\StoreEmployee;
use App\Http\Requests\UpdateEmployee;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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
        $this->authorizeResource(Employee::class, 'employee');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('products.employees.index', [
            'title' => 'Ubezpieczenia Pracownicze',
            'datatables' => Employee::getDatatablesData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('products.employees.create', [
            'title' => 'Nowy produkt pracowniczy',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEmployee $request
     * @return RedirectResponse
     */
    public function store(StoreEmployee $request): RedirectResponse
    {
        $employee = new Employee($request->all());
        Auth::user()->employees()->save($employee);

        return redirect()
            ->route('employees.show', $employee)
            ->with('notify_success', 'Nowy produkt pracowniczy został dodany!');
    }

    /**
     * Duplicate a newly created resource in storage.
     *
     * @param Employee $employee
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function duplicate(Employee $employee): RedirectResponse
    {
        $this->authorize('create', Employee::class);

        $newEmployee = $employee->replicate();
        $newEmployee->save();
        $newEmployee->files()->attach($employee->files);
        $newEmployee->notes()->attach($employee->notes);

        return redirect()
            ->route('employees.show', $newEmployee)
            ->with('notify_success', 'Nowy produkt pracowniczy został zduplikowany!');
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return View
     */
    public function show(Employee $employee): View
    {
        return view('products.employees.show', [
            'title' => 'Szczegóły',
            'employee' => $employee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return View
     */
    public function edit(Employee $employee): View
    {
        return view('products.employees.edit', [
            'title' => 'Edycja produktu pracowniczego',
            'employee' => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEmployee $request
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function update(UpdateEmployee $request, Employee $employee): RedirectResponse
    {
        $employee->update($request->all());

        return redirect()
            ->route('employees.show', $employee)
            ->with('notify_success', 'Dane produktu pracowniczego zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->with('notify_danger', 'Produkt pracowniczy został usunięty!');
    }
}
