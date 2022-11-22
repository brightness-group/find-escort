<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        if($request->role != $user['role']){
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            $message = "";
        
            switch ($request->role)
            {
                case "admin":
                    $message = 'Sorry, we could not find the admin account with that credential.';
                    break;
                case "customer":
                    $message = 'Sorry, we could not find the member account with that credential.';
                    break;
                case "escort":
                    $message = 'Sorry, we could not find the escort account with that credential.';
                    break;
            }
            return redirect(url()->previous())->with('warning', $message);
        }

        if($user['role'] == 'escort'){

            switch ($user['progress'])
                {
                    case 0:
                        return redirect()->intended(route('escorts.register.information'));
                    case 1:
                        return redirect()->intended(route('escorts.register.advertising'));
                    case 2:
                        return redirect()->intended(route('escorts.register.pictures'));
                    case 3:
                        return redirect()->intended(route('escorts.register.subscription'));
                    case 4:
                        return redirect()->intended(route('escorts.register.subscription.addons'));
                    case 5:
                        return redirect()->intended(route('escorts.register.subscription.reviews'));    
                    case 6:
                        return redirect()->intended(route('escorts.register.subscription.pay'));                            
                    default:
                        return redirect()->intended(route('escorts.profile'));
                }

        }else if($user['role'] == 'customer'){
            
            return redirect()->intended(route('home'));

        }else if($user['role'] == 'admin'){
            
            return redirect()->intended(route('admin.dashboard'));

        }else{

            return redirect()->intended(RouteServiceProvider::HOME);

        }
        
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
