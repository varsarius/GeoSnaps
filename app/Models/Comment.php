<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Comment extends Model
{
    use HasFactory;

    use HasFactory;
    use SoftDeletes;

    protected $table = "comments";

    protected $fillable = [
        'message',
        'post_id',
        'user_id',
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getDateAsCarbonAttribute()
    {
        //Carbon::setLocale(App::getLocale());
        return Carbon::parse($this->created_at);
    }
}
