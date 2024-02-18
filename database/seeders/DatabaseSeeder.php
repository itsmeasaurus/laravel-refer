<?php

namespace Database\Seeders;

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
        // User::truncate();
        // Category::truncate();
        // Post::truncate();

        $user = User::factory()->create([
            'name' => 'John Doe',
        ]);

        Post::factory(15)->create([
            'user_id' => $user,
        ]);

        // $user = User::factory()->create();

        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);

        // $family = Category::create([
        //     'name' => 'Family',
        //     'slug' => 'family'
        // ]);

        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $personal->id,
        //     'title' => 'My First Post',
        //     'slug' => 'my-first-post',
        //     'excerpt' => 'Aliquam veritatis vehicula dicta! Sit, facere! Class deserunt iaculis, cupidatat.',
        //     'body' => 'Aliquam veritatis vehicula dicta! Sit, facere! Class deserunt iaculis, cupidatat.Aliquam veritatis vehicula dicta! Sit, facere! Class deserunt iaculis, cupidatat.',
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $personal->id,
        //     'title' => 'My Second Post',
        //     'slug' => 'my-second-post',
        //     'excerpt' => 'Aliquam veritatis vehicula dicta! Sit, facere! Class deserunt iaculis, cupidatat.',
        //     'body' => 'Aliquam veritatis vehicula dicta! Sit, facere! Class deserunt iaculis, cupidatat.Aliquam veritatis vehicula dicta! Sit, facere! Class deserunt iaculis, cupidatat.',
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $family->id,
        //     'title' => 'My Third Post',
        //     'slug' => 'my-third-post',
        //     'excerpt' => 'Aliquam veritatis vehicula dicta! Sit, facere! Class deserunt iaculis, cupidatat.',
        //     'body' => 'Aliquam veritatis vehicula dicta! Sit, facere! Class deserunt iaculis, cupidatat.Aliquam veritatis vehicula dicta! Sit, facere! Class deserunt iaculis, cupidatat.',
        // ]);
    }
}
