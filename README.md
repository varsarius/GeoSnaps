# geoSnaps

## Требования

- PHP >= 8.2
- Composer
- Node.js & NPM
- Herd (Желательно, очень желательно!)

## Установка

1. Склонируйте репозиторий с помощью git:

```bash
git clone https://github.com/varsarius/GeoSnaps/tree/tunel
```

2. Перейдите в каталог проекта:

```bash
cd GeoSnaps
```

3. Установите зависимости PHP с помощью composer:

```bash
composer install
```

4. Установите зависимости JavaScript с помощью npm:

```bash
npm install
```

5. Скопируйте файл `.env.example` и переименуйте его в `.env`, затем настройте свои переменные окружения.

6. Сгенерируйте ключ приложения:

```bash
php artisan key:generate
```

7. Запустите миграции базы данных и сиды:

```bash
php artisan migrate --seed
```

8. Соберите ваши ресурсы JavaScript и CSS:

```bash
npm run dev
```

## Настройка php.ini

Увеличьте размер файлов, которые можно загружать через формы, и увеличьте лимиты POST-запросов в вашем файле `php.ini`:

```ini
upload_max_filesize = 1000M
post_max_size = 1000M
```

## Запуск сервера

Запустите встроенный сервер Laravel с помощью команды:

```bash
php artisan serve
```

Теперь вы можете открыть свое приложение в браузере по адресу `http://localhost:8000`.
