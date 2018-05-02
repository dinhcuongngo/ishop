<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index()
    {
        //
        $users = User::all();

        return view('users.users',['users'=>$users]);

    }

    public function store(Request $request)
    {
        //
        $rules  = [
            'name' => 'required',
            'email' => 'required|email|unique:users, email_address',
            'password' => 'required|confirmed|min:6',
        ];
        $msg    = [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email'  => 'The syntax of email is not correct.',
            'email.unique' => 'This email address is already existed.',
            'password.required' => 'The password field is required',
            'password.confirmed' => 'These password are not matched.',
            'password.min' => 'The length of password is at least of 6 characters.',
        ];

        $this->validate($request,$rules,$msg);

        $user = $request->all();

        $user['password'] = bcrypt($request->password);
        $user['verified'] = User::UNVERIFIED_USER;
        $user['verification_token'] = User::generateVerificationCode();
        $user['admin']    = User::REGULAR_USER;

        User::create($user);

        return route('signup')->with('success','Successfully added new user.');

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

    public function logOut()
    {
        Auth::logout();

        return redirect()->route('welcome');
    }
}
