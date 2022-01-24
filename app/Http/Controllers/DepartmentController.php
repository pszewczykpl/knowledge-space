<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartment;
use App\Http\Requests\UpdateDepartment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Department::class, 'department');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('departments.index', [
            'title' => 'Departamenty',
            'datatables' => Department::getDatatablesData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('departments.create', [
            'title' => 'Nowy departament',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDepartment $request
     * @return RedirectResponse
     */
    public function store(StoreDepartment $request): RedirectResponse
    {
        $department = new Department($request->all());
        Auth::user()->departments()->save($department);

        return redirect()
            ->route('departments.show', $department)
            ->with('notify_success', 'Nowy departament został dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param Department $department
     * @return View
     */
    public function show(Department $department): View
    {
        return view('departments.show', [
            'title' => 'Szczegóły',
            'department' => $department,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     * @return View
     */
    public function edit(Department $department): View
    {
        return view('departments.edit', [
            'title' => 'Edycja departamentu',
            'department' => $department,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDepartment $request
     * @param Department $department
     * @return RedirectResponse
     */
    public function update(UpdateDepartment $request, Department $department): RedirectResponse
    {
        $department->update($request->all());

        return redirect()
            ->route('departments.show', $department)
            ->with('notify_success', 'Dane departamentu zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return RedirectResponse
     */
    public function destroy(Department $department): RedirectResponse
    {
        $department->delete();

        return redirect()
            ->route('departments.index')
            ->with('notify_danger', 'Departament został usunięty!');
    }
}
