<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\App;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Device;
use App\Models\Type;
use App\Models\UserAgent;
use App\Models\Visitor;
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

        $devices =  Device::inRandomOrder()->get('id');
        $types =  Type::doesntHave('child')->inRandomOrder()->get('id');
        App::factory()->count(50)->create()
        ->each(function ($apps) use ($types, $devices){
            $apps->types()->attach($types->random(rand(1,4)));
            $apps->devices()->attach($devices->random(rand(1,2)));
        });

        Contact::factory()->count(10)->create();
        Client::factory()->count(15)->create();
        Comment::factory()->count(25)->create();
        UserAgent::factory()->count(20)->create();
        Visitor::factory()->count(50)->create();
        Comment::factory()->count(25)->create();
    }
}
