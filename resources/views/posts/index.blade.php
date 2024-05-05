@extends('layouts.default')
@section('content')
<div>
    <h1>The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk </h1>
    <a href="{{ route('posts.create') }}">Create</a>
    @foreach($posts as $post)
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
                <a href="{{ route('posts.show', $post->id) }}">Show</a>
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
    @endforeach
</div>
@endsection
