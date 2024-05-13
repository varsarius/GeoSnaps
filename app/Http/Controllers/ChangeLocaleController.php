<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class ChangeLocaleController extends Controller
{
    public function __invoke($locale)
    {
        Session::put('locale', $locale);
        App::setLocale($locale);
        return redirect()->back();
    }
}
