<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'item_id' => 1,
            'comment' => "とても素晴らしい",
        ];
        Comment::create($param);
        $param = [
            'user_id' => 2,
            'item_id' => 1,
            'comment' => "ぜひ欲しい",
        ];
        Comment::create($param);
        $param = [
            'user_id' => 3,
            'item_id' => 1,
            'comment' => "買いました!!",
        ];
        Comment::create($param);
        
    }
}