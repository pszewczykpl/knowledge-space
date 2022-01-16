<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use App\Models\Permission;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
     * @return Application|Factory|View
     */
    public function index()
    {
        $this->authorize('viewany', User::class);
        
        return view('users.index', [
            'title' => 'Pracownicy',
            'datatables' => User::getDatatablesData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        
        return view('users.create', [
            'title' => 'Nowy pracownik',
            'description' => 'Uzupełnij dane pracownika i kliknij Zapisz',
            'departments' => Department::all(),
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUser  $request
     * @return Response
     */
    public function store(StoreUser $request)
    {
        $this->authorize('create', User::class);

        $user = new User;
        $user->fill($request->all());
        if ($request->hasFile('avatar')) {
            $path = $request->avatar->store('avatars');
            $user->avatar_path = $path;
        }
        $user->password = Hash::make($request->new_password);
        $user->department()->associate(Department::find($request->department_id));
        $user->save();
        $user->permissions()->attach($request->permission_id);

        return redirect()->route('users.show', $user->id)->with('notify_success', 'Nowy pracownik został dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return Response
     */
    public function show(User $user)
    {
        return view('users.show', [
            'title' => 'Szczegóły',
            'description' => $user->first_name . ' ' . $user->last_name,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('users.edit', [
            'title' => 'Edycja pracownika',
            'description' => 'Zaktualizuj dane pracownika i kliknij Zapisz',
            'user' => User::findOrFail($user->id),
            'departments' => Department::all(),
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUser  $request
     * @param  \App\User  $user
     * @return Response
     */
    public function update(UpdateUser $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update($request->except('avatar_remove'));

        if ($request->hasFile('avatar')) {
            $path = $request->avatar->store('avatars');
            $user->avatar_path = $path;
        } else if ($request->avatar_remove) {
            $user->avatar_path = null;
        }

        if($request->new_password) {
            $user->password = Hash::make($request->new_password);
        }
        $user->department()->associate(Department::find($request->department_id));
        $user->save();

        if(isset($request->permission_id)) {
            $user->permissions()->sync($request->permission_id);
        }

        return redirect()->route('users.edit', $user->id)->with('notify_success', 'Dane pracownika zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();

        return redirect()->route('users.index')->with('notify_danger', 'Pracownik został usunięty!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        $this->authorize('restore', $user);
        $user->restore();

        return redirect()->route('users.index')->with('notify_danger', 'Pracownik został przywrócony!');
    }

    /**
     * Force remove the specified resource from storage.
     *
     * @param  id  $id
     * @return Response
     */
    public function force_destroy($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        $this->authorize('forceDelete', $user);
        $user->forceDelete();

        return redirect()->route('users.index')->with('notify_danger', 'Użytkownik został trwale usunięty!');
    }
}
