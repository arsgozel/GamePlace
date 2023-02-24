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
            ['Telefon', 'Phone'],
            ['Kompyuter', 'Computer'],
            ['Telewizor', 'Television'],
        ];

        for ($i = 0; $i < count($objs); $i++) {
            Device::create([
                'name_tm' => $objs[$i][0],
                'name_en' => $objs[$i][1],
                'sort_order' => $i + 1,
            ]);
        }
    }
}
