<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Like;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 7; $i++) {
            $param = [];
            $param['user_id'] = 6 - (($i % 5) + 1);
            $param['item_id'] = $i;
            Like::create($param);
        }
    }
}
