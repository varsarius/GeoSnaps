<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = "posts";
    protected $fillable = [
        'name',
        'description',
        'latitude',
        'longitude',
    ];

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }


}
