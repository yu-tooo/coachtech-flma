<?php

namespace Database\Seeders;

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
        $conditions = ['新品', '優良', '良好', '良い', '可'];

        for($i = 1; $i <= 5; $i++) {
            $param = [];
            $param['condition'] = $conditions[$i - 1];
            Condition::create($param);
        }
    }
}
