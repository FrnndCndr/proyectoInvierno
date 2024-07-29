<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function store(Request $request){

        $messages = makeMessages();

        //TODO: Validate the user's input data
        $this->validate($request,[
            'email' => ['required', 'email'],
            'password' => ['required', 'min:3'],
        ], $messages);

        //? Authenticate the newly created user
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('message', 'The credentials are incorrect');
        }

        //! Redirect the user to the homepage
        return redirect()->route('products');
    }
}
