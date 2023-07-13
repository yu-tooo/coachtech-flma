<?php

namespace Database\Seeders;

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
    
            $param = [
                'user_id' => 1,
                'postcode' => mt_rand(1000000, 9999999),
                'address' => "東京都港区台場2-4-1",
                'building' => 'towntowr'
            ];
            Profile::create($param);
    }
}
