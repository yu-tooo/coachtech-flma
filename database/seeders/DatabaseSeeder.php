<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categorie;
use App\Models\Category_item;
use App\Models\Comment;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,
            ItemSeeder::class,
            LikeSeeder::class,
            CommentSeeder::class,
            ConditionSeeder::class,
            CategoryitemSeeder::class,
            CategorySeeder::class,
        ]);
    }
}
