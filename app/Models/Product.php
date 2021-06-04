<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'old_id_product',
        'category_id',
        'sort_order',
        'views',
        'price',
        'weight','shipping_freight','in_stock','sku','name','slug',
        'brief_description','description','is_active','is_deleted','user_id'
    ];
    public function thumb()
    {
        return $this->morphOne('App\Models\Image', 'imageable')->where('table_name', 'productsthumb');
    }
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable')->where('table_name', 'productsmain');
    }
    public function category () {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
