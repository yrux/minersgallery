<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table='feedbacks';
    protected $fillable = [
        'email','name','subject','description','is_active','is_deleted','user_id'
    ];
}
