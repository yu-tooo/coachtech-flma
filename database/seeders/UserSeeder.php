<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => '山崎健斗',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('asdf1234')
            ], 
            [
            'name' => '本田翼',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('asdf1234')
            ],
            [
            'name' => '西澤由夏',
            'email' => 'user3@gmail.com',
            'password' => Hash::make('asdf1234')
            ],
            [
            'name' => '吉沢亮',
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
