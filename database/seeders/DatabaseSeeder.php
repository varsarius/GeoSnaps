<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //dd(rand(3, 34));
        // User::factory(10)->create();

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
            'name' => 'Bla bla bla',
            'description' => 'BL BLALBLALLBALLBLAL',
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
            'name' => 'Bla bla bla 2',
            'description' => 'BL BLALBLALLBALLBLAL 2',
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
            'name' => 'Bla bla bla 3',
            'description' => 'BL BLALBLALLBALLBLAL 3',
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
            'name' => 'Bla bla bla 4',
            'description' => 'BL BLALBLALLBALLBLAL 4',
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
            'name' => 'Bla bla bla 5',
            'description' => 'BL BLALBLALLBALLBLAL 5',
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
            'name' => 'Bla bla bla 6',
            'description' => 'BL BLALBLALLBALLBLAL 6',
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
            'name' => 'Bla bla bla 7',
            'description' => 'BL BLALBLALLBALLBLAL 7',
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
            'name' => 'Bla bla bla 8',
            'description' => 'BL BLALBLALLBALLBLAL 8',
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
            'name' => 'Bla bla bla 9',
            'description' => 'BL BLALBLALLBALLBLAL 9',
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
            'name' => 'Bla bla bla 10',
            'description' => 'BL BLALBLALLBALLBLAL 10',
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
            'name' => 'Bla bla bla 11',
            'description' => 'BL BLALBLALLBALLBLAL 11',
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
            'name' => 'Bla bla bla 12',
            'description' => 'BL BLALBLALLBALLBLAL 12',
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
            'name' => 'Bla bla bla 13',
            'description' => 'BL BLALBLALLBALLBLAL 13',
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
            'name' => 'Bla bla bla 14',
            'description' => 'BL BLALBLALLBALLBLAL 14',
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
