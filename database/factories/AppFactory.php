<?php

namespace Database\Factories;

use App\Models\App;
use App\Models\CharacteristicValue;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\App>
 */
class AppFactory extends Factory
{
    public function definition()
    {
        $age_rating = CharacteristicValue::where('characteristic_id', 1)->inRandomOrder()->first();
        $language = CharacteristicValue::where('characteristic_id', 2)->inRandomOrder()->first();
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        $num3 = rand(1, 10);
        $sizeAmounts = ['Gb', 'Mb', 'Kb'];
        $name = fake()->streetName();

        return [
            'name' => $name,
            'age_rating_id' => $age_rating->id,
            'language_id' => $language->id,
            'has_add' => rand(0, 1),
            'app_status' => rand(0, 1),
            'slug' => str()->slug($name) . '-' . str()->random(10),
            'downloads' => rand(10, 20),
            'rating' => rand(1, 5),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now')->format('d.m.y'),
            'updated_at' => fake()->dateTimeBetween('-2 month', 'now')->format('d.m.y'),
            'version' => $num1 . '.' . $num2 . '.' . $num3,
            'description' => fake()->text(rand(500, 800)),
            'size' => rand(1, 300) . $sizeAmounts[rand(0, 2)],
        ];
    }
}
