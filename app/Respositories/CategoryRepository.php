<?php

namespace App\Respositories;

use App\Category;

class CategoryRepository
{
	public function listAllCategories()
	{
		return Category::all();
	}
}