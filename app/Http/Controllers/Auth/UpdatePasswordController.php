<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use App\Http\Requests\UpdatePassword;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
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
        $this->authorize('update', Auth::user());
        
        return view('auth.passwords.update', [
            'title' => 'Zmiana hasła',
        ]);
    }
    
    /**
     * Update password in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePassword $request)
    {
        $this->authorize('update', Auth::user());

        $user = User::findOrFail(Auth::user()->id);
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect()->route('users.edit', $user->id)->with('notify_success', 'Hasło zostało zaktualizowane!');
    }
}
