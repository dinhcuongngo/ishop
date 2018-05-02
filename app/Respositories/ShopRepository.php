<?php

namespace App\Respositories;

use App\Shop;

class ShopRepository
{
	public function listAllShop()
	{
		return Shop::all();
	}
}