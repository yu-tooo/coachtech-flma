<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Condition;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conditions = ['可', '良い', '良好', '優良', '新品'];

        for($i = 0; $i < 5; $i++) {
            $param = [];
            $param['condition'] = $conditions[$i];
            Condition::create($param);
        }
    }
}
