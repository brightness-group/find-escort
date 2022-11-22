<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        
        // if ($request->user()->hasVerifiedEmail()) {
        //     return redirect(RouteServiceProvider::HOME.'?verified=1');
        // }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        
        if($request->user()->role == 'escort'){

            switch ($request->user()->progress)
                {
                    case 0:
                        return redirect(route('escorts.register.information'));
                    case 1:
                        return redirect(route('escorts.register.advertising'));
                    case 2:
                        return redirect(route('escorts.register.pictures'));
                    case 3:
                        return redirect(route('escorts.register.subscription'));
                    case 4:
                        return redirect(route('escorts.register.subscription.addons'));
                    case 5:
                        return redirect(route('escorts.register.subscription.reviews'));    
                    case 6:
                        return redirect(route('escorts.register.subscription.pay'));                            
                    default:
                        return redirect(route('escorts.profile'));
                }

        }

        return redirect(RouteServiceProvider::HOME.'?verified=1');
    }
}
