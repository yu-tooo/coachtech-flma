<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            [
            'name' => 'ユーザー1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password1234')
            ], 
            [
            'email' => 'user2@example.com',
            'password' => Hash::make('password1234')
            ]
        ];

        foreach ($param as $value) {
            User::create($value);
        }
    }
}
