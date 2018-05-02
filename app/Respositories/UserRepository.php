<?php

namespace App\Respositories;

use App\User;

class UserRepository
{
	public function listAllUsers()
	{
		return User::all();
	}

	public function findUserById($id)
	{
		return User::find($id);
	}
}