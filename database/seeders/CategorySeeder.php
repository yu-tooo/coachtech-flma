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
        $names = ['装着', '高級', '運動', '贈呈', '学生', '台所', '電子'];
        for($i = 0; $i < 7; $i++) {
            $param = [];
            $param['name'] = $names[$i];
            Category::create($param);
        }
    }
}
