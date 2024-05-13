<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\RedirectResponse;


class DestroyImageController extends Controller
{
    public function __invoke(Image $image) : RedirectResponse
    {
        $image->delete();
        return redirect()->back();
    }
}
