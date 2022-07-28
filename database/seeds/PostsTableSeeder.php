<?php

use App\Category;
use Illuminate\Database\Seeder;
use App\Post;
use App\User;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        factory(User::class, 5)->create();

        for ($i = 0; $i < 10; $i++){
            $user = User::inRandomOrder()->first();
            $category = Category::inRandomOrder()->first();

            $tmpPost = new Post();
            $tmpPost->title = $faker->sentence();
            $tmpPost->content = $faker->text();
            $tmpPost->category_id = $category->id;
            $tmpPost->user_id = $user->id;
            $tmpPost->published = $faker->numberBetween(0,1);
            $tmpPost->save();
        }
    }
}
