<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Permission;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param Request $request
     * @return RedirectResponse
     *
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'department_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = new User;
        $user->username = (string) (function () use ($request) {
            $login = strtolower(substr($request->first_name, 0, 1) . $request->last_name);
            for($i = 0; User::where('username', '=', $login . ($i === 0 ? '' : $i))->exists(); $i++);
            return $login . ($i === 0 ? '' : $i);
        })();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->department()->associate(Department::find($request->department_id));
        $user->company = 'Open Life TU Życie S.A.';
        $user->location = 'Warszawa';
        $user->position = 'Specjalista';
        $user->save();

        $user->permissions()->attach(Permission::whereIn('code',
            [
                'users-viewany',
                'replies-create',
                'permissions-viewany',
                'notes-create',
                'news-create',
                'departments-viewany',
                'departments-view',
            ]
        )->pluck('id')->toArray());

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
