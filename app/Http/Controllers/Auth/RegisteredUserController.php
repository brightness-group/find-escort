<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        \Validator::make($request->all(), [
            'email'     => 'required|string|email|max:255|unique:users',
            'username'  => 'required|alpha_dash|max:20|unique:users,username',
            'password'  => 'required|string|min:8',
            'terms_and_conditions' => 'required',
        ])->validateWithBag('register');

        Auth::login($user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));

        //return redirect(route('home'));
        return redirect(route('verification.notice'));
    }
}
