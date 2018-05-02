<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonUserController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        //
    }


    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }

    public function viewSignup()
    {
        return view('users.signup');
    }

    public function signUp(Request $request)
    {
        $rules  = [
            'name' => 'required',
            'email' => 'required | email |unique:users,email',
            'password' => 'required | confirmed | min:6',
        ];
        $msg    = [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email'  => 'The syntax of email is not correct.',
            'email.unique'=> 'This email address is already existed.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password is at least 6 characters.',
            'password.confirmed' => 'These passwords are not matched.', 
        ];

        $this->validate($request, $rules, $msg);

        $data = $request->all();

        $data['verified']   = User::UNVERIFIED_USER;
        $data['admin']      = User::REGULAR_USER;
        $data['verification_token'] = User::generateVerificationCode();
        $data['password']   = bcrypt($request->password);

        // dd($data);

       User::create($data);

        return redirect()->route('signup')->with('success','Successfully signed up!');
    }
}
