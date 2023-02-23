<?php

namespace Database\Seeders;

use App\Models\Manager;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Manager::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('password'),
        ]);
    }
}
