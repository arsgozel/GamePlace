<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $client = DB::table('clients')->inRandomOrder()->first();
        $app = DB::table('apps')->inRandomOrder()->first();

        return [
            'is_approved' => fake()->boolean(60),
            'client_id' => $client->id,
            'app_id' => $app->id,
            'comment' => fake()->text(rand(20, 50)),
            'star' => rand(0, 10),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
        ];
    }
}
