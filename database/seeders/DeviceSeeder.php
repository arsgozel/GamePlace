<?php

namespace Database\Seeders;

use App\Models\Device;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $objs = [
            ['Telefon', 'Phone', 'Телефон'],
            ['Kompyuter', 'Computer', 'Компьютер'],
            ['Telewizor', 'Television', 'Телевизор'],
        ];

        for ($i = 0; $i < count($objs); $i++) {
            Device::create([
                'name_tm' => $objs[$i][0],
                'name_en' => $objs[$i][1],
                'name_ru' => $objs[$i][2],
                'sort_order' => $i + 1,
            ]);
        }
    }
}
