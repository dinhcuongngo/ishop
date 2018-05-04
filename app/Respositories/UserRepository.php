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

		return $users;
	}
}