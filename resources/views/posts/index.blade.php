@extends('layouts.default')
@section('content')
    <style>
        .carousel-item img {
            height: 300px; /* Задайте высоту, которую вы хотите */
            width: 100%; /* Это убедится, что изображение всегда занимает 100% ширины своего контейнера *!*/
            object-fit: contain; /* Это убедится, что изображение всегда будет заполнять контейнер, сохраняя при этом свои пропорции */
        }

    </style>
<div>
    <h1>{{ __('messages.post_idx') }}</h1>
    @if(isset($search))
        {{ __('messages.search_view') }} &nbsp; {{ $search }}
    @endif
    <div class="container mx-auto mt-4">
        <div class="row">
            <form class="form-group d-flex align-items-center" method="post" action="/postss/filterr/">
                @csrf
                <div class="input-group mb-3 flex-grow-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text">-O</span>
                    </div>
                    <input type="text" name="search" class="form-control" aria-label="Amount (to the nearest dollar)" />
                </div>
                <button type="submit" class="btn btn-primary ml-3" style="height: 38px; margin-left: 3em; margin-top: -1em">{{ __('messages.Search') }}</button>
            </form>
        </div>


        <div class="row">
            @foreach($posts as $post)

                <div class="col-md-4" style="margin-bottom: 2rem">
                    <div class="card" style="width: 22rem;">

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
                            <a href="{{ route('map', $post->id) }}" class="btn btn-primary btn-square float-end" style="width: 30px;
  height: 30px;
  padding: 0;">
                                <i class="bi bi-geo-alt-fill"></i>
                                <span class="visually-hidden">Показать на карте</span>
                            </a>
                            <p class="card-text"><pre style="white-space: pre-wrap;     display: -webkit-box;
    -webkit-line-clamp: 13; /* количество отображаемых строк */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;">{{ $post->description }}</pre></p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary "><i class="fab fa-github"></i> {{ __('messages.Show') }}</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        {{ $posts->links() }}
    </div>
</div>
@endsection
