<?php

namespace App;

use App\Category;
use App\Shop;
use App\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;

    const AVAILABLE_PRODUCT = 'available';
    const UNAVAILABLE_PRODUCT = 'unavailable';

    protected $table = 'products';

    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'code',
    	'name',
    	'photo',
    	'cost_price',
    	'sale_price',
    	'description',
    	'shop_id',
    	'status',
    ];

    public function categories()
    {
    	return $this->belongsToMany(Category::class);
    }

    public function shops()
    {
    	return $this->belongsTo(Shop::class);
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class);
    }

}
