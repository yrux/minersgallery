<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metatag extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_uri',
        'meta_title','meta_keywords','meta_description',
        'is_active','is_deleted','user_id'
    ];
}
