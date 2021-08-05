<?php

namespace App\Http\Controllers;

use App\Models\Bancassurance;
use App\Models\Department;

use App\Http\Requests\StoreDepartment;
use App\Http\Requests\UpdateDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
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
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartment $request)
    {
        $this->authorize('create', Department::class);
        
        $department = new Department($request->all());
        $department->save();

        return redirect()->route('departments.show', $department->id)->with('notify_success', 'Nowy departament został dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('departments.show', [
            'title' => 'Szczegóły',
            'department' => $department,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $this->authorize('update', $department);

        return view('departments.edit', [
            'title' => 'Edycja departamentu',
            'description' => 'Zaktualizuj dane departamentu i kliknij Zapisz',
            'department' => Department::findOrFail($department->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartment $request, Department $department)
    {
        $this->authorize('update', $department);
        $department->update($request->all());

        return redirect()->route('departments.show', $department->id)->with('notify_success', 'Dane departamentu zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $this->authorize('delete', $department);
        $department->delete();

        return redirect()->route('departments.index')->with('notify_danger', 'Departament został usunięty!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $department = Department::withTrashed()->findOrFail($id);

        $this->authorize('restore', $department);
        $department->restore();

        return redirect()->route('departments.index')->with('notify_danger', 'Departament został przywrócony!');
    }

    /**
     * Force remove the specified resource from storage.
     *
     * @param  id  $id
     * @return \Illuminate\Http\Response
     */
    public function force_destroy($id)
    {
        $department = Department::withTrashed()->findOrFail($id);

        $this->authorize('forceDelete', $department);
        
        $department->forceDelete();

        return redirect()->route('departments.index')->with('notify_danger', 'Departament został trwale usunięty!');
    }
}
