<?php

namespace App\Http\Controllers\Post;

use App\Actions\StorePostAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\RedirectResponse;


class StoreController extends Controller
{
    public function __invoke(StorePostRequest $request, StorePostAction $action) : RedirectResponse
    {
        $action->handle($request->all(), $request->file('images'));
        return redirect()->route('home');
    }
}
