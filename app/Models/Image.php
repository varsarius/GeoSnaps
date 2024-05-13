<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "images";

    protected $fillable = [
        'image_url',
        'post_id',
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public static function upload_for_post($files, $post_id){
        foreach ($files as $file) {
            $fileName = $file->getClientOriginalName();
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $image = self::create([
                'image_url' => 'images/' . uniqid('', true) . '.' . $fileActualExt,
                'post_id' => $post_id,
            ]);
            move_uploaded_file($file->getPathName(), $image->image_url);
            $image->save();
        }
    }

}
