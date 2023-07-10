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
            'email' => 'user1@gmail.com',
            'password' => Hash::make('asdf1234')
            ], 
            [
            'name' => 'ユーザー2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('asdf1234')
            ],
            [
            'name' => 'ユーザー3',
            'email' => 'user3@gmail.com',
            'password' => Hash::make('asdf1234')
            ],
            [
            'email' => 'user4@gmail.com',
            'password' => Hash::make('asdf1234')
            ],
            [
            'email' => 'user5@gmail.com',
            'password' => Hash::make('asdf1234')
            ]
        ];

        foreach ($param as $value) {
            User::create($value);
        }
    }
}
