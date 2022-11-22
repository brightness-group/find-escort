<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Response;

class AdultController extends Controller
{
    public function getForm(Request $request)
    {
        return view('confirm-your-age');
    }

    public function postForm(Request $request)
    {
        // Store a piece of data in the session...
        $request->validate([
            'confirm_your_age' => 'required',
        ]);
        
        setcookie('confirmAge', 'confirmed', time() + 86400, "/");
        
        return redirect()->route('home');
    }
}
