@extends('layouts.default')
@section('content')
<div>
    <h1>The only way to do great work is to love what you do. - Steve Jobs </h1>
    <h3>Edit a Post</h3>
    <form action="{{ route('posts.update', $post) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3 form-group">
            <label class="form-label" for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{$post->name}}">
        </div>
        <div class="mb-3 form-group">
            <label class="form-label" for="description">Description</label>
            <textarea id="description" class="form-control" name="description" rows="3" required>{{$post->description}}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
@endsection
