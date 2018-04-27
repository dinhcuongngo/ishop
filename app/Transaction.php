<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    use SoftDeletes;

    protected $table = 'transactions';

    protected $fillable = [
    	'customer_id',
    	'product_id',
    	'quantity',,
    ];

    protected $dates = ['deleted_at'];

    public function customer()
    {
    	return $this->belongsTo(Customer::class);
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
