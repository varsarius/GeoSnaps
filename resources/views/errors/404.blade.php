@extends('layouts.default')
@section('content')
    @php
        if (\Illuminate\Support\Facades\Session::has('locale')) {
            \Illuminate\Support\Facades\App::setLocale(\Session::get('locale'));
        }
    @endphp
    <h1>{{ __('messages.404') }}</h1>
@endsection
