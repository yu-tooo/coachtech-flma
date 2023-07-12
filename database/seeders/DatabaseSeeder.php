<?php

namespace Database\Seeders;

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
        \App\Models\Owner::factory([
            'name' => '田中瑠偉',
            'email' => 'owner@example.com'
        ])->create();
        \App\Models\Admin::factory([
            'name' => '森田悠斗',
            'email' => 'admin@example.com'
        ])->create();

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
