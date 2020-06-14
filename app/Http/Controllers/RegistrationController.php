<?php

namespace App\Http\Controllers;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{

    public function create()
    {
        return view('register');
    }

    public function store(request $request)
    {
        // validation
        $this->validate(request(),
            [
                'name' => 'required|min:6|max:16',
                'email' => 'required|email|max:25',

//                'password' => 'min:12',
            ]);

//        create user ..

        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);

        $user->save();

//        add role for new user in site

        $user->roles()->attach(Role::where('name','user')->first());







//        login for user
        auth()->login($user);

//        redirect

        return redirect('posts');
    }

}
