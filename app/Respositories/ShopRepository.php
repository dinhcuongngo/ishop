<?php

namespace App\Respositories;

use App\Shop;
use Illuminate\Support\Facades\Auth;

class ShopRepository
{
	

	public function __construct()
	{
		
	}

	public function listAllShop()
	{
		return Shop::all();
	}

	public function listShopByOwner()
	{
		$user_id = Auth::user()->id;
		return Shop::where('user_id',$user_id)->get();
	}

	public function listActiveShopByOwner()
	{
		$user_id = Auth::user()->id;
		return Shop::where([
				['user_id', '=', $user_id],
				['status', '=', 'active'],
					])->get();
	}

	public function findShopById($id)
	{
		return Shop::find($id);
	}
}