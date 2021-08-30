<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Permission;
use App\Models\Department;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'department_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = new User;
        $user->username = (string) (function () use ($data) {
            $login = strtolower(substr($data['first_name'], 0, 1) . $data['last_name']);
            for($i = 0; User::where('username', '=', $login . ($i === 0 ? '' : $i))->exists(); $i++);
            return $login . ($i === 0 ? '' : $i);
        })();
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->department()->associate(Department::find($data['department_id']));
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

        return $user;
    }
}
