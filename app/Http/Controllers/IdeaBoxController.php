<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TimeHunter\LaravelGoogleReCaptchaV3\Validations\GoogleReCaptchaV3ValidationRule;
use App\Models\IdeaBox;
class IdeaBoxController extends Controller
{
    public function show(Request $request){

    	$ideas = IdeaBox::orderBy('created_at','desc')->orderBy('id', 'desc')->paginate(4);
    	return view('pages.idea-box', compact('ideas'));

    }

    public function create(Request $request){

    	$request->validate([
		    'name'     => 'required|string',
		    'title'    => 'required|string',
		    'content'  => 'required|string',
		    'g-recaptcha-response' => [new GoogleReCaptchaV3ValidationRule('contact_us')]
		]);

    	$user = IdeaBox::create($request->all());
    	
    	return redirect(route('idea.box'))->with('success', 'Thank you for submission!');
    	
    }
}
