<?php

namespace Database\Seeders;

use App\Models\CategoryItem;
use Illuminate\Database\Seeder;

class CategoryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = ['item_id' => 1, 'category_id' => 1];
        CategoryItem::create($param);
        $param = ['item_id' => 1, 'category_id' => 3];
        CategoryItem::create($param);
        $param = ['item_id' => 2, 'category_id' => 5];
        CategoryItem::create($param);
        $param = ['item_id' => 4, 'category_id' => 6];
        CategoryItem::create($param);
        $param = ['item_id' => 5, 'category_id' => 1];
        CategoryItem::create($param);
        $param = ['item_id' => 5, 'category_id' => 2];
        CategoryItem::create($param);
        $param = ['item_id' => 5, 'category_id' => 4];
        CategoryItem::create($param);
        $param = ['item_id' => 6, 'category_id' => 1];
        CategoryItem::create($param);
        $param = ['item_id' => 6, 'category_id' => 2];
        CategoryItem::create($param);
        $param = ['item_id' => 7, 'category_id' => 1];
        CategoryItem::create($param);
        $param = ['item_id' => 7, 'category_id' => 4];
        CategoryItem::create($param);
        $param = ['item_id' => 8, 'category_id' => 7];
        CategoryItem::create($param);
    }
}
