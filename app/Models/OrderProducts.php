<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'rowtotal',
        'qty',
    ];
    public function product () {
        return $this->hasOne(Product::class,'product_id','id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
