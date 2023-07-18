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
        $names = ['靴', 'シャーペン', '枕', '包丁', 'バック', '時計'];

        $price = ['5400', '1200', '1800', '3250', '800', '32000'];

        for($i = 0; $i < 6; $i++) {
            $param = [];
            $param['name'] = $names[$i];
            $param['price'] = $price[$i];
            $param['description'] = $names[$i]. 'です。'. $price[$i]. '円で販売いたします。';
            $param['img_url'] = 'items/item'. strval($i + 1). '.jpg';
            $i < 3 ? $param['url'] = 'https://www.google.com/': null;
            $param['user_id'] = ($i + 1) % 2 + 1;
            $param['condition_id'] = ($i + 2) % 4 + 1;

            Item::create($param);
        }
    }
}
