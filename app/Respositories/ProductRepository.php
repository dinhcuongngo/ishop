<?php

namespace App\Respositories;

use App\Product;

class ProductRepository
{
	public function listAllProducts()
	{
		return Product::all();
	}

	public function listProductByID($id)
	{
		return Product::find($id);
	}
}