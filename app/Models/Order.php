<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='order';
    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'phone',
        'city',
        'zip','country','notes','address','email',
        'discount','order_rowtotal','order_products','order_total'
    ];
    public function products () {
        return $this->hasMany(OrderProducts::class,'id','order_id');
    }
}
