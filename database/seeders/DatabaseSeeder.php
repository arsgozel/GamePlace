<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\App;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Contact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(array(
            ManagerSeeder::class,
            TypeSeeder::class,
            DeviceSeeder::class,
            CharacteristicValueSeeder::class,
        ));

        App::factory()->count(30)->create();
        Contact::factory()->count(10)->create();
        Client::factory()->count(15)->create();
        Comment::factory()->count(25)->create();
    }
}
