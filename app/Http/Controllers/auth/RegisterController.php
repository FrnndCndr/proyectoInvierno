<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(Request $request){

        $messages = makeMessages();

        //TODO: Validate the user's input data
        $this->validate($request,[
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:3'],
        ], $messages);

        //* Create a new user in the database
        User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);

        //? Authenticate the newly created user
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        //! Redirect the user to the homepage
        return redirect()->route('products');
    }
}
