<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Respositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        
        $users = $this->userRepository->listAllUsers();

        return view('users.users',['users'=>$users]);

    }

    public function store(Request $request)
    {
        //
        $rules  = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
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

        if($request->has('photo'))
        {
            // dd($request->file('photo'));
            $user['photo'] = $request->file('photo')->store('images');
        }

        User::create($user);

        return back()->with('success','Successfully added new user.');

    }

    public function show(User $user)
    {
        //
        // dd($user);
        return view('users.edit',['user'=>$user]);  
    }

    public function update(Request $request, User $user)
    {
        //dd($user);

        $user->fill($request->only([
            'name', 'email', 'photo'
        ]));


        if($request->file('photo') != ""){

            if($user->photo != ""){
                $user->photo = $request->file('photo')->store('images');
            }
            
        }
        
        
        if($user->isClean())
        {
            return back()->withErrors('You need to specify the different value to update.');
        }


        $user->save();
        

        return back()->with('success','Successfully updated!');

    }

    public function viewChangePassword($id)
    {
        return view('users.change',['id'=>$id]);
    }

    public function changePassword(Request $request, $id)
    {
        $rules  = [
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ];

        $msg    = [
            'current_password.required' => 'The current password is required.',
            'password.required' => 'The new password is required.',
            'password.confirmed' => 'These passwords are not matched.',
            'password.min' => 'The password is at least 6 characters.',
        ];

        $this->validate($request, $rules, $msg);
        
        $user = $this->userRepository->findUserById($id);

        // dd($user);

        // dd($request->current_password, $user->password);

        if(Hash::check($request->current_password, $user->password))
        {
            // dd("Check passwords");
            $user->password = bcrypt($request->password);
            $user->save();

            return back()->with('success','Successfully changed password.');
        }
        else
        {
            return back()->withErrors('Authenication is failed!');
        }
    }

    public function destroy(User $user)
    {
        //
        $user->delete();

        return back();
    }

}
