<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //dd(rand(3, 34));
        // User::factory(10)->create();

        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);


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
