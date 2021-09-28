<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartment;
use App\Http\Requests\UpdateDepartment;
use Illuminate\Auth\Access\AuthorizationException;
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
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('viewAny', Department::class);
        
        return view('departments.index', [
            'title' => 'Departamenty',
            'datatables' => Department::getDatatablesData()
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
        $this->authorize('create', Department::class);
        
        return view('departments.create', [
            'title' => 'Nowy departament',
            'description' => 'Uzupełnij dane departamentu i kliknij Zapisz',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDepartment $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(StoreDepartment $request): RedirectResponse
    {
        $this->authorize('create', Department::class);
        
        $department = new Department($request->all());
        Auth::user()->departments()->save($department);

        return redirect()->route('departments.show', $department->id)->with('notify_success', 'Nowy departament został dodany!');
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
     * @throws AuthorizationException
     */
    public function edit(Department $department) : View
    {
        $this->authorize('update', $department);

        return view('departments.edit', [
            'title' => 'Edycja departamentu',
            'description' => 'Zaktualizuj dane departamentu i kliknij Zapisz',
            'department' => $department,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDepartment $request
     * @param Department $department
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(UpdateDepartment $request, Department $department): RedirectResponse
    {
        $this->authorize('update', $department);
        $department->update($request->all());

        return redirect()->route('departments.show', $department->id)->with('notify_success', 'Dane departamentu zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Department $department): RedirectResponse
    {
        $this->authorize('delete', $department);
        $department->delete();

        return redirect()->route('departments.index')->with('notify_danger', 'Departament został usunięty!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function restore(int $id): RedirectResponse
    {
        $department = Department::withTrashed()->findOrFail($id);

        $this->authorize('restore', $department);
        $department->restore();

        return redirect()->route('departments.index')->with('notify_danger', 'Departament został przywrócony!');
    }

    /**
     * Force destroy the specified resource from storage.
     *
     * @param int $id $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function force_destroy(int $id): RedirectResponse
    {
        $department = Department::withTrashed()->findOrFail($id);

        $this->authorize('forceDelete', $department);
        $department->forceDelete();

        return redirect()->route('departments.index')->with('notify_danger', 'Departament został trwale usunięty!');
    }
}
