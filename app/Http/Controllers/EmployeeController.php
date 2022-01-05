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
     * @throws AuthorizationException
     */
    public function create(): View
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
     * @param StoreEmployee $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(StoreEmployee $request): RedirectResponse
    {
        $this->authorize('create', Employee::class);
        
        $employee = new Employee($request->all());
        Auth::user()->employees()->save($employee);

        return redirect()->route('employees.show', $employee->id)->with('notify_success', 'Nowy produkt pracowniczy został dodany!');
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
     * @param Employee $employee
     * @return View
     */
    public function show(Employee $employee): View
    {
        $history = Cache::remember("employees:$employee->id:history", 60*60*12, function () use ($employee) {
            return Employee::where('name', '=', $employee->name)
                ->orderBy('edit_date', 'desc')->get();
        });

        StoreEvent::dispatch('show', $employee);
        return view('products.employees.show', [
            'title' => 'Szczegóły',
            'employee' => $employee,
            'archive_employees' => $history,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return View
     * @throws AuthorizationException
     */
    public function edit(Employee $employee): View
    {
        $this->authorize('update', $employee);

        return view('products.employees.edit', [
            'title' => 'Edycja produktu pracowniczego',
            'description' => 'Zaktualizuj dane produktu i kliknij Zapisz',
            'employee' => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEmployee $request
     * @param Employee $employee
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(UpdateEmployee $request, Employee $employee): RedirectResponse
    {
        $this->authorize('update', $employee);
        $employee->update($request->all());

        return redirect()->route('employees.show', $employee->id)->with('notify_success', 'Dane produktu pracowniczego zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Employee $employee): RedirectResponse
    {
        $this->authorize('delete', $employee);
        $employee->delete();

        return redirect()->route('employees.index')->with('notify_danger', 'Produkt pracowniczy został usunięty!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function restore($id): RedirectResponse
    {
        $employee = Employee::withTrashed()->findOrFail($id);

        $this->authorize('restore', $employee);
        $employee->restore();

        return redirect()->route('employees.index')->with('notify_danger', 'Produkt pracowniczy został przywrócony!');
    }

    /**
     * Force remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function force_destroy($id): RedirectResponse
    {
        $employee = Employee::withTrashed()->findOrFail($id);

        $this->authorize('forceDelete', $employee);
        $employee->forceDelete();

        return redirect()->route('employees.index')->with('notify_danger', 'Produkt pracowniczy został trwale usunięty!');
    }
}
