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
        \App\Models\Admin::factory([
            'name' => '山田太郎',
            'email' => 'admin@example.com'
        ])->create();
        
        $this->call(ConditionSeeder::class);

        $this->call([
            // UserSeeder::class,
            // ItemSeeder::class,
            // CategoryItemSeeder::class,
            // CategorySeeder::class,
            // CommentSeeder::class,
            // LikeSeeder::class,
            // ProfileSeeder::class,
        ]);
    }
}
