<!DOCTYPE html>
<html>
<head>
    <title>Моя Яндекс Карта</title>
    <meta charset="utf-8">
    <!-- Подключаем Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU" type="text/javascript"></script>
    <script>
        var map;
        var markers = []; // массив для хранения маркеров
        var defaultMarker; // маркер по умолчанию

        ymaps.ready(initMap);

        function initMap() {
            var moldovaCenter = [47.4116, 28.3699]; // Начальные координаты для Молдовы
            map = new ymaps.Map('map', {
                center: moldovaCenter,
                zoom: 6
            });

            // Добавляем маркер по умолчанию (синий маркер)
            defaultMarker = new ymaps.Placemark(moldovaCenter, {}, {
                draggable: true // разрешаем перемещение маркера
            });
            map.geoObjects.add(defaultMarker); // добавляем маркер на карту
            markers.push(defaultMarker); // добавляем маркер в массив

            // Добавляем обработчик завершения перемещения маркера
            defaultMarker.events.add('dragend', function(event) {
                var coords = event.get('target').geometry.getCoordinates();
                console.log('Новые координаты: ' + coords[0] + ', ' + coords[1]);
            });

            // Создаем маркеры и устанавливаем для каждого информационное окно
            var locations = [

                @foreach($posts as $post)
                    {lat: {{$post->latitude}}, lng: {{$post->longitude}}, link: '{{ route('posts.show', $post->id) }}'},
                @endforeach
            ];

            locations.forEach(function(location) {
                var position = [location.lat, location.lng];
                var marker = addMarker(position, location.link);

                // Добавляем обработчик клика на маркер, чтобы открыть информационное окно при щелчке
                //marker.events.add('click', function() {
                //    window.location.href = location.link; // переход по ссылке
                //});
            });
        }

        // Функция для добавления маркера на карту
        function addMarker(position, link) {
            var marker = new ymaps.Placemark(position, {
                iconContent: 'Текст', // Текст, который будет отображаться над маркером
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
</head>
<body>
<div id="map" style="height: 100vh; width: 100vw;"></div>
</body>
</html>
