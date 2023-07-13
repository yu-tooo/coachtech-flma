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
    }
}
