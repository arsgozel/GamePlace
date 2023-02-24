<?php

namespace Database\Seeders;

use App\Models\Characteristic;
use App\Models\CharacteristicValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharacteristicValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $objs = [
            ['name_tm' => 'Ýaş aralygy', 'name_en' => 'Age_rating', 'values' => [
                ['name_tm' => 'Çagalar üçin', 'name_en' => 'Kids'],
                ['name_tm' => '16+', 'name_en' => null],
                ['name_tm' => '12+', 'name_en' => null],
            ]],
            ['name_tm' => 'Diller', 'name_en' => 'Languages', 'values' => [
                ['name_tm' => 'Turkmençe', 'name_en' => null],
                ['name_tm' => 'Inlis-dili', 'name_en' => null],
                ['name_tm' => 'Rus-dili', 'name_en' => null],
            ]],
        ];

        for ($i = 0; $i < count($objs); $i++) {
            $characteristic = Characteristic::create([
                'name_tm' => $objs[$i]['name_tm'],
                'name_en' => $objs[$i]['name_en'],
                'sort_order' => $i + 1,
            ]);

            for ($j = 0; $j < count($objs[$i]['values']); $j++) {
                CharacteristicValue::create([
                    'characteristic_id' => $characteristic->id,
                    'name_tm' => $objs[$i]['values'][$j]['name_tm'],
                    'name_en' => $objs[$i]['values'][$j]['name_en'],
                    'sort_order' => $j + 1,
                ]);
            }
        }
    }
}
