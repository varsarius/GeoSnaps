@extends('layouts.default')
@section('content')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU" type="text/javascript"></script>
    <script>
        var moldovaCenter = [47.02551261915755, 28.83032397617856]; // Начальные координаты для Молдовы
        var coords = moldovaCenter
        @if(null !== old('latitude'))coords =  [ {{ old('latitude') }} , {{ old('longitude') }}]; @endif
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



            // Создаем маркеры и устанавливаем для каждого информационное окно
            var locations = [
                @foreach($posts as $post)
                    {
                        lat: {{$post->latitude}},
                        lng: {{$post->longitude}},
                        link: '{{ route('posts.show', $post->id) }}',
                        imgUrl: '{{ asset($post->images->first()->image_url)}}',
                    },
                @endforeach
            ];

            locations.forEach(function(location) {
                var position = [location.lat, location.lng];
                var marker = addMarker(position, location.link, location.imgUrl);

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
            // Добавляем маркер по умолчанию (синий маркер)
            defaultMarker = new ymaps.Placemark(cord_def, {
                iconContent: '<i class="fa-3x bi-lg bi bi-person-circle"></i>', // Текст, который будет отображаться над маркером
                balloonContentHeader: 'A long time ago',
                balloonContentBody: 'In a galaxy',
                balloonContentFooter: 'Far, Far Away...',
                hintContent: 'Укажи координаты.'
            }, {
                draggable: true, // разрешаем перемещение маркера
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
            });

            map.geoObjects.add(marker); // добавляем маркер на карту
            markers.push(marker); // добавляем маркер в массив

            return marker;
        }
    </script>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    @if($error!=='') <li>{{ $error }}</li>@endif
                @endforeach
            </ul>
        </div>
    @endif
    <form id="uploadForm" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('messages.Tittle') }}</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('messages.name the post') }}"  value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{ __('messages.description') }}</label>
            <textarea id="description" class="form-control" name="description" rows="3"> {{ old('description') }} </textarea>
        </div>
        <div>
            <label for="formFileLg" class="form-label">{{ __('messages.Choose some images') }}</label>
            <input class="form-control form-control-lg" id="formFileLg" type="file" name="images[]" multiple="">
        </div>
        <br>
        <br>

        <label class="form-check-label col-md-7" for="openMap">
        <div id="upper_map" class="col-md-7 form-check form-switch {{ old('tt') ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="{{ old('tt') ? 'true' : 'false' }}" aria-controls="collapseExample">
             <div>{{ __('messages.show coordinates on the map') }}</div>
            <input class="form-check-input" type="checkbox" id="openMap" name="tt" {{ old('tt') ? 'checked' : '' }} />
        </div>
        </label>
        <div class="collapse {{ old('tt') ? 'show' : '' }}" id="collapseExample">
            <div class="card card-body" id="map" style="height: 40vh; width: 70vw;"></div>
        </div>



        <input type="hidden" name="latitude" id="lat"/>
        <input type="hidden" name="longitude" id="lng"/>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">{{ __('messages.Create Post') }}</button>
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

        document.getElementById('openMap').addEventListener('change', function(e) {
            if (this.checked === false) {
                document.getElementById('lat').setAttribute('value', null);
                document.getElementById('lng').setAttribute('value', null);

                document.getElementById('upper_map').classList.add('collapsed');
                document.getElementById('collapseExample').classList.remove('show');

            } else {
                document.getElementById('lat').setAttribute('value', coords[0]);
                document.getElementById('lng').setAttribute('value', coords[1]);

                document.getElementById('upper_map').classList.remove('collapsed');
                document.getElementById('collapseExample').classList.add('show');
            };
        });
    </script>
@endsection
