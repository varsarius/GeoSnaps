@extends('layouts.default')
@section('content')
    <!-- Подключаем Bootstrap CSS -->
    <script src="https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU" type="text/javascript"></script>
    <script>
        var moldovaCenter = [47.02551261915755, 28.83032397617856]; // Начальные координаты для Молдовы
        var map;
        var markers = []; // массив для хранения маркеров
        var defaultMarker; // маркер по умолчанию

        ymaps.ready(initMap);

        function initMap() {
            map = new ymaps.Map('map', {
                @if($id != -1)
                    center: @foreach($posts as $post)

                        @if($post->id == $id) [ {{$post->latitude}}, {{$post->longitude}} ],  @endif
                    @endforeach
                @else
                    center: moldovaCenter,
                @endif
                zoom: 12
            });

            // Создаем маркеры и устанавливаем для каждого информационное окно
            var locations = [
                @foreach($posts as $post)
                    {
                        lat: {{$post->latitude}},
                        lng: {{$post->longitude}},
                        link: '{{ route('posts.show', $post->id) }}',
                        imgUrl: '{{ asset($post->images->first()->image_url)}}',
                        x: @if($post->id == $id) 100 @else 50 @endif,
                        y: @if($post->id == $id) 100 @else 50 @endif,
                    },
                @endforeach
            ];

            locations.forEach(function(location) {
                var position = [location.lat, location.lng];
                var marker = addMarker(position, location.link, location.imgUrl, location.x, location.y);

                // Добавляем обработчик клика на маркер, чтобы открыть информационное окно при щелчке
                //marker.events.add('click', function() {
                //    window.location.href = location.link; // переход по ссылке
                //});
            });

            // Создаем кнопку "Показать мое местоположение"
            var MyLocationButton = new ymaps.control.Button({
                data: {
                    content: "Где я",
                    title: "Нажмите, чтобы перейти на своё местоположение"
                },
                options: {
                    selectOnClick: false
                }
            });

            // Добавляем обработчик клика на кнопку
            MyLocationButton.events.add('click', function () {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var pos = [position.coords.latitude, position.coords.longitude];
                        defaultMarker.geometry.setCoordinates(pos); // перемещаем маркер по умолчанию
                        map.setCenter(pos); // центрируем карту на местоположении пользователя
                    }, function() {
                        alert('Ошибка: Не удалось получить ваше местоположение.'); //c http будет всегда это. нужен https.
                    });
                } else {
                    // Браузер не поддерживает геолокацию
                    alert('Ошибка: Ваш браузер не поддерживает геолокацию.');
                }
            });

            // Добавляем кнопку на карту
            map.controls.add(MyLocationButton);

        }

        // Функция для добавления маркера на карту
        function addMarker(position, link, imgUrl, x, y) {
            var marker = new ymaps.Placemark(position, {
                iconContent: '<img style="margin-left: '+(-0.4*x)+'px; margin-top: '+(-1.8*y)+'px" width="'+x+'" height="'+y+'" src="'+imgUrl+'" alt="?"/>', // Текст, который будет отображаться над маркером
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

    <div class="justify-content-md-center">
        <div id="map"  style="height: 50vh; width: 50vw;"></div>
    </div>
@endsection
