<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    //
	use SoftDeletes;

	const AVAILABLE_SHOP = 'available';
	const UNAVAILABLE_SHOP = 'unavailable';

    protected $table = 'shops';

    protected $fillable = [
    	'name',
    	'description',
    	'logo',
    	'user_id',
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
    	return $this->belongsTo(User::class);
    }

    
}
