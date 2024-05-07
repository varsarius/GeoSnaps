@extends('layouts.default')
@section('content')
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
                document.getElementById('lat').setAttribute('value', coords[0]);
                document.getElementById('lng').setAttribute('value', coords[1]);
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
                    console.log(navigator.geolocation);
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var pos = [position.coords.latitude, position.coords.longitude];
                        defaultMarker.geometry.setCoordinates(pos); // перемещаем маркер по умолчанию
                        map.setCenter(pos); // центрируем карту на местоположении пользователя
                    }, function() {
                        alert('Ошибка: Не удалось получить ваше местоположение.');
                    });
                } else {
                    // Браузер не поддерживает геолокацию
                    alert('Ошибка: Ваш браузер не поддерживает геолокацию.');
                }
            });

            // Добавляем кнопку на карту
            map.controls.add(MyLocationButton);

        }
    </script>


    <form id="uploadForm" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name the post" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" class="form-control" name="description" rows="3" required></textarea>
        </div>
        <div>
            <label for="formFileLg" class="form-label">Large file input example</label>
            <input class="form-control form-control-lg" id="formFileLg" type="file" name="images[]" multiple="">
        </div>
        <br>
        <br>
        <div id="map" style="height: 30vh; width: 60vw;">5</div>
        <input type="hidden" name="latitude" id="lat"/>
        <input type="hidden" name="longitude" id="lng"/>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
    <br>
    <div id="fileList"></div>

    <script>
        document.getElementById('formFileLg').addEventListener('change', function(e) {
            var fileList = document.getElementById('fileList');
            fileList.innerHTML = ''; // очистить список перед добавлением новых файлов
            var files = this.files;
            for (var i = 0; i < files.length; i++) {
                (function(file) {
                    var img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.height = 100; // измените размер по своему усмотрению
                    img.onload = function() {
                        URL.revokeObjectURL(this.src); // освобождение ресурсов после загрузки изображения
                    }
                    img.style.marginLeft = "2rem";
                    img.style.marginBottom = "2rem";
                    fileList.appendChild(img);
                })(files[i]);
            }
        });
    </script>
@endsection
