@extends('layouts.default')
@section('content')
<div>
    <h1>Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh </h1>
    <ul>
        <li>
            {{$post->name}}
        </li>
        <li>
            {{$post->description}}
        </li>
        <li>
            <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
        </li>
        <li>
            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    </ul>
    <br>
</div>
@endsection
