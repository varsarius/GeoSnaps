<?php

namespace App\Http\Controllers\Post;

use App\Actions\UpdatePostAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;


class UpdateController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function __invoke(UpdatePostRequest $request,UpdatePostAction $action,Post $post) : RedirectResponse
    {
        $action->handle(
            $request->file('images'),
            $post,
            $request->except('latitude', 'longitude'),
            $request->latitude,
            $request->longitude,
        );
        return redirect()->back();
    }
}
