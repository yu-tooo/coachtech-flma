<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category_item;
use Illuminate\Database\Seeder;

class Category_itemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item_id = [1, 1, 1, 2, 2, 3];
        $category_id = [1, 2, 3, 1, 4, 3];

        for ($i = 0; $i < 6; $i++) {
            $param = [];
            $param['item_id'] = $item_id[$i];
            $param['category_id'] = $category_id[$i];
            Category_item::create($param);
        }
    }
}
