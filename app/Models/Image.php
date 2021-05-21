<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
	public $primaryKey = 'id';
    protected $fillable = [
        'url', 'imageable_id', 'imageable_type','table_name',
    ];
    public function imageable()
    {
        return $this->morphTo();
    }
}
