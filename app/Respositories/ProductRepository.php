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

	public function searchProduct($name,$shop,$status)
	{
		$products = Product::where(function($query) use($name,$shop,$status){
					if(isset($name)) $query = $query->where('name', 'LIKE', '%'.$name.'%');
					if(isset($shop)) $query = $query->where('shop_id',$shop);
					if(isset($status)) $query = $query->where('status',$status);

					return $query;
		})->paginate(15);

		return $products;
	}
}