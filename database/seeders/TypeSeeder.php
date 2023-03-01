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
            ['Oýun', null, null, [
                ['Aсtion', null, null],
                ['Role playing', null, null],
                ['Puzzle', null, null],
                ['Strategy', null, null],
            ]],
            ['E-Kitap', null, null, [
                ['Business', null, null],
                ['Drama', null, null],
            ]],
            ['Syýahat', null, null, [
                ['Adventure', null, null],
            ]],
            ['Lifestyle', null, null, [
                ['Sports', null, null],
            ]],
            ['Music', null, null, [
                ['Relaxing', null, null],
                ['Jazz', null, null],
            ]],


        ];

        for ($i = 0; $i < count($objs); $i++) {
            $type = Type::create([
                'name_tm' => $objs[$i][0],
                'name_en' => $objs[$i][1],
                'name_ru' => $objs[$i][2],
                'sort_order' => $i + 1,
            ]);

            for ($j = 0; $j < count($objs[$i][3]); $j++) {
                Type::create([
                    'parent_id' => $type->id,
                    'name_tm' => $objs[$i][3][$j][0],
                    'name_en' => $objs[$i][3][$j][1],
                    'name_ru' => $objs[$i][3][$j][2],
                    'sort_order' => $j + 1,
                ]);
            }
        }
    }
}
