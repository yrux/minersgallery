<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInquiry extends Model
{
    use HasFactory;
    protected $table='product_inquiry';
    protected $fillable = [
        'email','name','message'
    ];
}
