<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

	public function __create()
	{
		$this->middleware('guest', ['except' => 'destroy']);
	}


    public function create()
    {
    	return view('auth.login');

    }

    public function store()
    {
    	if (! auth()->attempt(request(['email', 'password']))) 
    	{
    		return back()->withErrors([
    			'message' => 'Usuario o contraseña incorrectos'
    		]);
    	}

    	return redirect ('/');
    }

    public function destroy()
    {
    	auth()->logout();

    	return redirect('/');
    }

}
