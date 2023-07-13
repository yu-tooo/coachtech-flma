<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['装着', '高級', '運動'];
        for($i = 0; $i < 3; $i++) {
            $param = [];
            $param['name'] = $names[$i];
            Category::create($param);
        }
    }
}
