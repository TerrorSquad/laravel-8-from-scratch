<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $userJohnDoe = User::factory()->create([
            'name' => 'John Doe',
        ]);

        Post::factory(3)->create([
            'user_id' => $userJohnDoe->id,
        ]);

        $userJaneDoe = User::factory()->create([
            'name' => 'Jane Doe',
        ]);

        Post::factory(3)->create([
            'user_id' => $userJaneDoe->id,
        ]);

        Post::factory(5)->create();
    }
}
