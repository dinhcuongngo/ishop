<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    //
	use SoftDeletes;

	const ACTIVE_SHOP = 'active';
	const INACTIVE_SHOP = 'inactive';

    protected $table = 'shops';

    protected $fillable = [
    	'name',
    	'description',
    	'logo',
    	'user_id',
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }    
}
