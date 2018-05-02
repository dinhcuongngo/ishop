<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    //
	use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
    	'name',
    	'description',
    ];

    protected $dates = ['deleted_at'];

    public function products()
    {
    	return $this->belongsToMany(Product::class);
    }
}
