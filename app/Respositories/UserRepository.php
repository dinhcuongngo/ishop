<?php

namespace App\Respositories;

use App\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
	public function listAllUsers()
	{
		return User::paginate(15);
	}

	public function findUserById($id)
	{
		return User::find($id);
	}

	public function searchUser($name, $email, $admin, $role)
	{

		$users = User::where(function ($query) use ($name, $email, $admin, $role) {
                	if(isset($name)) $query = $query->where('name', 'like', '%'.$name.'%');
                	if(isset($email)) $query = $query->where('email', 'like', '%'.$email.'%');
                	if(isset($admin)) $query = $query->where('admin', $admin);
                	if(isset($role)) $query = $query->where('role', $role);

                    return $query;
                })
                ->paginate(15);
        // $users->withPath('/userSearch');
		// $cond_name	= isset($name) ? 'name LIKE "%'.$name.'%"' : 'true';
		// $cond_email	= isset($email) ? 'email LIKE "%'.$email.'%"' : 'true';
		// $cond_admin = isset($admin) ? 'admin = "'.$admin.'"' : 'true';
		// $cond_role 	= isset($role) ? 'role = "'.$role.'"' : 'true';
		// $query = 'select * from users where '.$cond_name.' AND '.$cond_email.' AND '.$cond_admin.' AND '.$cond_role.'';
		// // dd($query);
		// $users = DB::select($query);
		
		// dd($users);

		return $users;
	}
}