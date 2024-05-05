<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";
    protected $fillable = [
        'name',
        'description',
    ];

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }


}
