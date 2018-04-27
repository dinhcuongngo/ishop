<?php

namespace App;

use App\Shop;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Owner extends User
{
    //
    public function shops()
    {
    	return $this->hasMany(Shop::class);
    }
}
