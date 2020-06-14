<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function create()
    {
        return view('login');
    }





    public function store()
    {
        if ( auth()->attempt(request(['email','password'])))
        {

            return redirect('/posts');
        }

            {
                return back()->withErrors
                (['message'=>'Sorry We Have No Data About Your Email Or Password']);


            }

    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/posts');

    }

}