@extends('layouts.default')
@section('content')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU" type="text/javascript"></script>
    <script>
        var moldovaCenter = [47.02551261915755, 28.83032397617856]; // Начальные координаты для Молдовы
        var coords = moldovaCenter;
        coords =  [ {{ $post->latitude }} , {{ $post->longitude }}];
        var map;
        var markers = []; // массив для хранения маркеров
        var defaultMarker; // маркер по умолчанию

        var cord_def = coords;

        ymaps.ready(initMap);

        function initMap() {

            map = new ymaps.Map('map', {
                center: coords,
                zoom: 12
            });

            // Добавляем маркер по умолчанию (синий маркер)
            defaultMarker = new ymaps.Placemark(cord_def, {
                iconContent: '<i class="fa-3x bi-lg bi bi-person-circle"></i>', // Текст, который будет отображаться над маркером
                balloonContentHeader: 'Здесь',
                balloonContentBody: 'Была сделана..',
                balloonContentFooter: 'первая, и вообще все остальные фотографии',
                hintContent: 'здеся.'
            }, {
                draggable: false, // перемещение маркера
                zIndex: 10000,
                iconColor: 'blue',
                useMapMarginInDragging: true,
            });
            map.geoObjects.add(defaultMarker); // добавляем маркер на карту
            markers.push(defaultMarker); // добавляем маркер в массив

            // Добавляем обработчик завершения перемещения маркера
            defaultMarker.events.add('dragend', function(event) {
                coords = event.get('target').geometry.getCoordinates();
                console.log('Новые координаты: ' + coords[0] + ', ' + coords[1]);
                document.getElementById('lat').setAttribute('value', coords[0]);
                document.getElementById('lng').setAttribute('value', coords[1]);
            });
        }

        // Функция для добавления маркера на карту
        function addMarker(position, link, imgUrl) {
            var marker = new ymaps.Placemark(position, {
                iconContent: '<img style="margin-left: -20px; margin-top: -80px" width="50" height="50" src="'+imgUrl+'" alt="?"/>', // Текст, который будет отображаться над маркером
                balloonContentHeader: 'A long time ago',
                balloonContentBody: 'In a galaxy',
                balloonContentFooter: 'Far, Far Away...'+link,
                hintContent: 'May the Force be with you!'
            });

            map.geoObjects.add(marker); // добавляем маркер на карту
            markers.push(marker); // добавляем маркер в массив

            return marker;
        }
    </script>
    <div style="margin-bottom: 2em">
        <h1 class="card-title">{{$post->name}}</h1>
        <div class="container mx-auto mt-4">
            <div class="row">
                @foreach($post->images as $image)

                    <div class="col-md-4" style="margin-bottom: 2rem">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset($image->image_url) }}" class="rounded float-left" alt="{{ $post->title }}">
                        </div>
                    </div>

                @endforeach
            </div>
        </div>


        <div class="col-md-11" style="margin-bottom: 2rem">
                    <p class="card-text"><pre style="white-space: pre-wrap;     display: -webkit-box;
    -webkit-line-clamp: 13; /* количество отображаемых строк */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;">{{ $post->description }}</pre></p>
        </div>


        <div class="card card-body" id="map" style="height: 40vh; width: 70vw;"></div>






        <br>
        <div id="fileList"></div>
        <button class="btn btn-primary" onclick="window.history.back()">❮{{ __('messages.go back') }}</button>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2 style="margin-top: 5em">{{ __('messages.comments') }} ({{ $post->comments->count() }})</h2>

            <!-- Секция с комментариями -->
            <div class="comments-section">
                @foreach($post->comments as $comment)
                <div class="comment">
                    <strong>{{$comment->user->name}}</strong> <span>{{$comment->dateAsCarbon->diffForHumans()}}</span>
                    <p>{{$comment->message}}</p>
                    @can('view', Auth::user())
                        <form action="{{ route('posts.comments.destroy', $comment->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endcan
                </div>
                    <hr>
                @endforeach
            </div>



            @auth
            <!-- Форма для оставления комментария -->
            <h3 style="margin-top: 5em">{{ __('messages.leave_momments_from_the_name') }} {{ Auth::user()->name }}</h3>
            <form method="post" action=" {{ route('posts.comments.store', $post->id) }}">
            @csrf
                <div class="form-group">
                    <label for="message">{{ __('messages.comment') }}:</label>
                    <textarea class="form-control" name="message" id="message" rows="5" placeholder="{{ __('messages.input_your_comment') }}" required></textarea>
                </div>
                <button style="margin-top: 2em" type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
            </form>
            @endauth
        </div>
    </div>
@endsection
