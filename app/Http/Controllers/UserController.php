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
use Illuminate\Http\RedirectResponse;
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
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('users.index', [
            'title' => 'Pracownicy',
            'datatables' => User::getDatatablesData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('users.create', [
            'title' => 'Nowy pracownik',
            'departments' => Department::all(),
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user): View|Factory|Application
    {
        return view('users.show', [
            'title' => 'Szczegóły',
            'description' => $user->full_name,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user): View|Factory|Application
    {
        return view('users.edit', [
            'title' => 'Edycja pracownika',
            'user' => $user,
            'departments' => Department::all(),
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUser $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UpdateUser $request, User $user): RedirectResponse
    {
        $user->update($request->all());

        // Update avatar if new file is uploaded.
        if ($request->hasFile('avatar')) {
            $path = $request->avatar->store('avatars');
            $user->avatar_path = $path;
        }
        // Remove avatar if checkbox is checked.
        else if ($request->avatar_remove) {
            $user->avatar_path = null;
        }

        $user->department()->associate(Department::find($request->department_id));
        $user->save();

        // Sync permissions.
        if(isset($request->permission_id)) {
            $user->permissions()->sync($request->permission_id);
        }

        return redirect()
            ->route('users.edit', $user->id)
            ->with('notify_success', 'Dane pracownika zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('notify_danger', 'Pracownik został usunięty!');
    }
}
