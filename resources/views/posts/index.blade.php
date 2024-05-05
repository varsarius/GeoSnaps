@extends('layouts.default')
@section('content')
<div>
    <h1>The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk </h1>
    <a href="{{ route('posts.create') }}">Create</a>
    <div class="container mx-auto mt-4">
        <div class="row">
            @foreach($posts as $post)

                <div class="col-md-4" style="margin-bottom: 2rem">
                    <div class="card" style="width: 18rem;">

                        <div id="carouselExampleIndicators{{$post->id}}" class="carousel slide">
                            <div class="carousel-indicators">
                                @php
                                    $counter = 0;
                                @endphp
                                @foreach ($post->images as $image)
                                    @if($counter == 0)
                                        <button type="button" data-bs-target="#carouselExampleIndicators{{$post->id}}" data-bs-slide-to="{{$counter}}" class="active" aria-current="true" aria-label="Slide {{$counter+1}}"></button>
                                    @else
                                        <button type="button" data-bs-target="#carouselExampleIndicators{{$post->id}}" data-bs-slide-to="{{$counter}}" aria-label="Slide {{$counter+1}}"></button>
                                    @endif
                                    @php
                                        $counter++;
                                    @endphp
                                @endforeach
{{--                                <button type="button" data-bs-target="#carouselExampleIndicators{{$post->id}}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>--}}
{{--                                <button type="button" data-bs-target="#carouselExampleIndicators{{$post->id}}" data-bs-slide-to="1" aria-label="Slide 2"></button>--}}
{{--                                <button type="button" data-bs-target="#carouselExampleIndicators{{$post->id}}" data-bs-slide-to="2" aria-label="Slide 3"></button>--}}
                            </div>
                            <div class="carousel-inner">
                                @php
                                    $isFirstIteration = true;
                                @endphp
                                @foreach ($post->images as $image)
                                    <div class="carousel-item @if($isFirstIteration) active @php $isFirstIteration = false @endphp @endif">
                                        <img src="{{ asset($image->image_url) }}" class="d-block w-100" alt="{{ $post->title }}">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators{{$post->id}}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators{{$post->id}}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$post->name}}</h5>
                            <p class="card-text">{{$post->description}}</p>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary mr-2"><i class="fas fa-link"></i> Edit</a>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary "><i class="fab fa-github"></i> Show</a>
                            <form style="float: right" action="{{ route('posts.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</div>
@endsection
