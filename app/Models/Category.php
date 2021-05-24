<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='category';
    protected $fillable = [
        'parent_id','sort_order','views','name','slug','description','parent_category_id',
        'is_active','is_deleted','user_id',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
