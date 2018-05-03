<?php

namespace App\Respositories;

use App\Product;

class ProductRepository
{
	public function listAllProducts()
	{
		return Product::all();
	}
}