<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        $hobbies = Category::create([
            'name' => 'Hobbies',
            'slug' => 'hobbies',
        ]);

        Post::create(
            [
                'title' => 'My First Post',
                'excerpt' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>',
                'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>',
                'slug' => 'my-first-post',
                'category_id' => $personal->id,
                'user_id' => $user->id,
            ]
        );

        Post::create(
            [
                'title' => 'My Second Post',
                'excerpt' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>',
                'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>',
                'slug' => 'my-second-post',
                'category_id' => $work->id,
                'user_id' => $user->id,
            ]
        );

        Post::create(
            [
                'title' => 'My Third Post',
                'excerpt' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>',
                'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>',
                'slug' => 'my-third-post',
                'category_id' => $hobbies->id,
                'user_id' => $user->id,
            ]
        );
    }
}
