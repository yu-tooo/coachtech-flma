<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Categorie;
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
        $names = ['学生', '運動', '健康', '学習'];
        for($i = 0; $i < 4; $i++) {
            $param = [];
            $param['name'] = $names[$i];
            Categorie::create($param);
        }
    }
}
