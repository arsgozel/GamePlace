<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    public function run()
    {
        $objs = [
            ['Mugallym', null, [
                ['Inlis dili mugallym', null],
                ['Rus dili mugallym', null],
            ]],

        ];

        for ($i = 0; $i < count($objs); $i++) {
            $type = Type::create([
                'name_tm' => $objs[$i][0],
                'name_en' => $objs[$i][1],
                'sort_order' => $i + 1,
            ]);

            for ($j = 0; $j < count($objs[$i][2]); $j++) {
                Type::create([
                    'parent_id' => $type->id,
                    'name_tm' => $objs[$i][2][$j][0],
                    'name_en' => $objs[$i][2][$j][1],
                    'sort_order' => $j + 1,
                ]);
            }
        }
    }
}
