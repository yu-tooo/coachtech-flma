<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            '靴', 'シャーペン', '枕', '包丁', 'バック', '時計', 'ネックレス', 'スマホ', '冷蔵庫', 'グローブ', 'テレビ', 'ダンベル'];

        $price = ['5400', '1200', '1800', '3250', '800', '32000', '5000', '40000', '79000', '9800', '80000', '500'];

        for($i = 0; $i < 12; $i++) {
            $param = [];
            $param['name'] = $names[$i];
            $param['price'] = $price[$i];
            $param['description'] = $names[$i]. 'です。'. $price[$i]. '円で販売いたします。';
            $param['img_url'] = 'items/item'. strval($i + 1). '.jpg';
            $param['user_id'] = ($i + 1) % 5 + 1;
            $param['condition_id'] = ($i + 2) % 5 + 1;

            Item::create($param);
        }
    }
}
