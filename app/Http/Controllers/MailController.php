<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ComingSoon;
use App\Mail\ComingSoonContactUs;
use App\Mail\ContactUs;
use App\Mail\IdeaBox;
use App\Mail\ReferFriend;
use Mail;
use TimeHunter\LaravelGoogleReCaptchaV3\Validations\GoogleReCaptchaV3ValidationRule;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller {

   	public function referFriendEmail(Request $request)
    {
        $validated = $request->validate([
            'email'     => 'required|string|email|max:255',
        ]);

        $user = Auth::user();

        $data = array();

        $data['referral_link'] = $user->getReferralLinkAttribute();
        $data['username'] = $user->username;

        Mail::to($request->email)->send(new ReferFriend($data));

        return redirect( url()->previous() );
    }


    public function registerForm(Request $request)
    {
        $validated = $request->validateWithBag('comingsoon',[
            'email'                => 'required|string|email|max:255',
            'username'             => 'required',
            'password'             => 'required|string|min:8',
            'birthday'             => 'required|date|before:-18 years',
            'phone'                => 'required',
            'gender'               => 'required',
            'hair_color'           => 'required',
            'hair_length'          => 'required',
            'boob'                 => 'required',
            'activity'             => 'required',
            'country'              => 'required',
            'height'               => 'required',
            'body'                 => 'required',
            'eyes_color'           => 'required',
            'ethnicity'            => 'required',
            'cup_size'             => 'required',
            'pubic_hair'           => 'required',
            'client'               => 'required',
            'smoke'                => 'required',
            'tattoo'               => 'required',
            'activity'             => 'required',
            'bio'                  => 'required',
            'mobility'             => 'required',
            'young'                => 'required',
            'specialities'         => 'required',
            'g-recaptcha-response' => [new GoogleReCaptchaV3ValidationRule('register')]
        ]);

        Mail::to(env('MAIL_TO_ADDRESS'))->bcc($request->email)->send(new ComingSoon($request->all()));
        return redirect( url()->previous() )->with('success', 'Thank you for submission!');
    }

    public function contactForm(Request $request)
    {
        $validated = $request->validate([
            'email'     => 'required|string|email|max:255',
            'g-recaptcha-response' => [new GoogleReCaptchaV3ValidationRule('contact_us')]
        ]);

        Mail::to(env('MAIL_TO_ADDRESS'))->bcc($request->email)->send(new ComingSoonContactUs($request->all()));

        return redirect( url()->previous() )->with('success', 'Thank you for submission!');
    }

    public function postContactUs(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|string|email|max:255',
            'subject'   => 'required',
            'message'   => 'required',
            'g-recaptcha-response' => [new GoogleReCaptchaV3ValidationRule('contact_us')]
        ]);

        Mail::to(env('MAIL_TO_ADDRESS'))->bcc($request->email)->send(new ContactUs($request->all()));

        return redirect( url()->previous() )->with('success', 'Thank you for submission!');
    }

    public function ideaBox(Request $request)
    {
        $validated =  $request->validate([
            'name'     => 'required|string',
            'title'    => 'required|string',
            'content'  => 'required|string',
            'g-recaptcha-response' => [new GoogleReCaptchaV3ValidationRule('contact_us')]
        ]);

        $user = \App\Models\IdeaBox::create($request->all());

        Mail::to(env('MAIL_TO_ADDRESS'))->send(new IdeaBox($request->all()));

        return redirect(route('idea.box'))->with('success', 'Thank you for submission!');
    }    

}
