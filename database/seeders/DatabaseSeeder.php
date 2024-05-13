<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function getRandomCoordinates() {
        // Координаты Кишинёва
        $minLat = 46.995; // минимальная широта
        $maxLat = 47.037; // максимальная широта
        $minLong = 28.780; // минимальная долгота
        $maxLong = 28.920; // максимальная долгота

        // Генерируем случайные координаты в пределах этих значений
        $lat = mt_rand($minLat * 10000, $maxLat * 10000) / 10000;
        $long = mt_rand($minLong * 10000, $maxLong * 10000) / 10000;

        return array($lat, $long);
    }


    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'Admin',
       //     'remember_token' => Str::random(10),
        ]);

        // 1
        Post::factory()->create([
            'name' => 'Ночные фонари',
            'description' => 'Тысяча огней горят, укрытые окнами от холодной и темной улицы, но только несколько из них излучают тепло и уют. Их становится все меньше и меньше
На улиице светло - но также золодно и одиноко',
            'latitude' => $this->getRandomCoordinates()[0],
            'longitude' => $this->getRandomCoordinates()[1],
            'user_id' => 1,
        ]);

        for ($i = 0; $i<3;$i++) {
            Image::factory()->create([
                'image_url' => "/images/initials/1/$i.jpg",
                'post_id' => 1,
            ]);
        }

        // 2
        Post::factory()->create([
            'name' => 'Ночной город',
            'description' => 'Город сияющий яркими красками, пока где-то в глубине болотного цвета, гниют люди, гадая каки же завтра будет день',
            'latitude' => $this->getRandomCoordinates()[0],
            'longitude' => $this->getRandomCoordinates()[1],
            'user_id' => 1,
        ]);

        for ($i = 0; $i<3;$i++) {
            Image::factory()->create([
                'image_url' => "/images/initials/2/$i.jpg",
                'post_id' => 2,
            ]);
        }

        // 3
        Post::factory()->create([
            'name' => 'Центр города',
            'description' => 'Красиво правда же? И никто толком то и не спит',
            'latitude' => 47.04989417918211,
            'longitude' => 28.864171275100873,
            'user_id' => 1,
        ]);

        for ($i = 0; $i<3;$i++) {
            Image::factory()->create([
                'image_url' => "/images/initials/3/$i.jpg",
                'post_id' => 3,
            ]);
        }

        // 4
        Post::factory()->create([
            'name' => 'Обычный рабочий день',
            'description' => 'Жаркая, желтая дымка постоянно подымается над хрущами, все куда-то спешат и день проходит незаметно',
            'latitude' => $this->getRandomCoordinates()[0],
            'longitude' => $this->getRandomCoordinates()[1],
            'user_id' => 1,
        ]);

        for ($i = 0; $i<4;$i++) {
            Image::factory()->create([
                'image_url' => "/images/initials/4/$i.jpg",
                'post_id' => 4,
            ]);
        }

        // 5
        Post::factory()->create([
            'name' => 'Здания',
            'description' => 'Новое и старое во яву',
            'latitude' => $this->getRandomCoordinates()[0],
            'longitude' => $this->getRandomCoordinates()[1],
            'user_id' => 1,
        ]);

        for ($i = 0; $i<3;$i++) {
            Image::factory()->create([
                'image_url' => "/images/initials/5/$i.jpg",
                'post_id' => 5,
            ]);
        }

        // 6
        Post::factory()->create([
            'name' => 'Дороги',
            'description' => 'То шассе, то буреломы, никак не привыкну к этому в нашем городе',
            'latitude' => $this->getRandomCoordinates()[0],
            'longitude' => $this->getRandomCoordinates()[1],
            'user_id' => 1,
        ]);

        for ($i = 0; $i<3;$i++) {
            Image::factory()->create([
                'image_url' => "/images/initials/6/$i.jpg",
                'post_id' => 6,
            ]);
        }

        // 7
        Post::factory()->create([
            'name' => 'Свет по среди темноты',
            'description' => 'Это же место, где собираются все те - комго выбросило на берег? Это же то место где постоянно гуляют тени?',
            'latitude' => $this->getRandomCoordinates()[0],
            'longitude' => $this->getRandomCoordinates()[1],
            'user_id' => 1,
        ]);

        for ($i = 0; $i<3;$i++) {
            Image::factory()->create([
                'image_url' => "/images/initials/7/$i.jpg",
                'post_id' => 7,
            ]);
        }

        // 8
        Post::factory()->create([
            'name' => 'Что-то не так',
            'description' => 'Эти фотографии мне напоминает что-то незнакомое, но одновременнои приятное и родное чувство - правда от этого мне лучше не становится. На уме только грустныые мысли',
            'latitude' => $this->getRandomCoordinates()[0],
            'longitude' => $this->getRandomCoordinates()[1],
            'user_id' => 1,
        ]);

        for ($i = 0; $i<6;$i++) {
            Image::factory()->create([
                'image_url' => "/images/initials/8/$i.jpg",
                'post_id' => 8,
            ]);
        }

        // 9
        Post::factory()->create([
            'name' => 'Облака',
            'description' => 'Так и хочется потеряться в них и в этом божественном свете',
            'latitude' => $this->getRandomCoordinates()[0],
            'longitude' => $this->getRandomCoordinates()[1],
            'user_id' => 1,
        ]);

        for ($i = 0; $i<5;$i++) {
            Image::factory()->create([
                'image_url' => "/images/initials/9/$i.jpg",
                'post_id' => 9,
            ]);
        }

        // 10
        Post::factory()->create([
            'name' => 'Камни',
            'description' => 'Просто камни, а вы что хотели еще увидеть тут?',
            'latitude' => $this->getRandomCoordinates()[0],
            'longitude' => $this->getRandomCoordinates()[1],
            'user_id' => 1,
        ]);

        for ($i = 0; $i<8;$i++) {
            Image::factory()->create([
                'image_url' => "/images/initials/10/$i.jpg",
                'post_id' => 10,
            ]);
        }

        // 11
        Post::factory()->create([
            'name' => 'Еше больше камней',
            'description' => 'Но тут хотя бы постройки есть - и что-то отдаленно напоминающее рабочее производство',
            'latitude' => $this->getRandomCoordinates()[0],
            'longitude' => $this->getRandomCoordinates()[1],
            'user_id' => 1,
        ]);

        for ($i = 0; $i<4;$i++) {
            Image::factory()->create([
                'image_url' => "/images/initials/11/$i.jpg",
                'post_id' => 11,
            ]);
        }

        // 12
        Post::factory()->create([
            'name' => 'Меня снимают',
            'description' => 'Уберите камеру - согласно закону, людей нельзя снимать без их согласия',
            'latitude' => $this->getRandomCoordinates()[0],
            'longitude' => $this->getRandomCoordinates()[1],
            'user_id' => 1,
        ]);

        for ($i = 0; $i<1;$i++) {
            Image::factory()->create([
                'image_url' => "/images/initials/12/$i.jpg",
                'post_id' => 12,
            ]);
        }

        // 13
        Post::factory()->create([
            'name' => 'Однажды после рабочего дня',
            'description' => 'Прошолся я как-то по знакомым местам. Я никогда не замечал их такими. Тени выросли, и антураж стал совершено другим, более холодными чертовски знакомым мне. Антиутопчиный , ночной город начал преображаться во тьме',
            'latitude' => $this->getRandomCoordinates()[0],
            'longitude' => $this->getRandomCoordinates()[1],
            'user_id' => 1,
        ]);

        for ($i = 0; $i<4;$i++) {
            Image::factory()->create([
                'image_url' => "/images/initials/13/$i.jpg",
                'post_id' => 13,
            ]);
        }

        // 14
        Post::factory()->create([
            'name' => 'Еще один фанарь',
            'description' => 'Не знаю как, но еще раз осмотрелся назад, и понял что цикл повториться снова - смогу ли я выбраться из него? Если я поподу в такой же цикл. Зависит уже от меня самого.',
            'latitude' => $this->getRandomCoordinates()[0],
            'longitude' => $this->getRandomCoordinates()[1],
            'user_id' => 1,
        ]);

        for ($i = 0; $i<2;$i++) {
            Image::factory()->create([
                'image_url' => "/images/initials/14/$i.jpg",
                'post_id' => 14,
            ]);
        }



        //Post::factory()->has(Image::factory()->count(rand(1, 15)))->count(20)->create();

        /*for ($i = 0; $i < 20; $i++) {
            $post = Post::factory()->create();
            Image::factory(rand(1, 15))->create(['post_id' => $post->id]);
        }*/

        for ($i = 0; $i < 10; $i++) {
            $user = User::factory()->create();
            for ($j = 0; $j<7;$j++) {
                $post = Post::factory()->create(['user_id' => $user->id]);
                Image::factory(rand(1, 5))->create(['post_id' => $post->id]);
            }
        }


        /*
         *
         * for ($i = 0; $i < 10; $i++) {
            $user = User::factory()->create();
            for ($j = 0; $j<5;$j++){
                $post = Post::factory(rand(1, 5))->create(['user_id' => $user->id]);
                Image::factory(rand(1, 5))->create(['post_id' => $post->id]);
            }

        }
         *
         * */

        /*$posts = Post::factory(20)->create();
        $images = Image::factory(100)->create();
        foreach ($images as $image){
            $postsIds = $posts->random(5)->pluck('id');
            $image->post()->attach($postsIds);
        }*/


    }
}
