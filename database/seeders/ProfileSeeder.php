<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <=5; $i++) {
            $param = [];
            $param['user_id'] = $i;
            $param['img_url'] = 'users/person'. $i. '.png';
            $param['postcode'] = mt_rand(1000000, 9999999);
            $param['address'] = "東京都港区台場2-4-". $i;
            Profile::create($param);
        }
    }
}
