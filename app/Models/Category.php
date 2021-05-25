<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='category';
    protected $with = ['childs'];
    protected $fillable = [
        'parent_id','sort_order','views','name','slug','description','parent_category_id',
        'is_active','is_deleted','user_id','show_on_home',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function childs (){
        return $this->hasMany('App\Models\Category','parent_id','id');
    }
    public function parent (){
        return $this->hasOne('App\Models\Category','id','parent_id');
    }
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable')->where('table_name', 'category');
    }
}
