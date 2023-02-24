<?php

namespace Database\Factories;

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
        $nameTm = fake()->streetName();
        $nameEn = null;

        return [
            'name_tm' => $nameTm,
            'name_en' => $nameEn,
            'age_rating_id' => $age_rating->id,
            'language_id' => $language->id,
            'slug' => str()->slug($nameTm) . '-' . str()->random(10),
            'downloads' => rand(10, 20),
            'rating' => rand(1, 5),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            'updated_at' => fake()->dateTimeBetween('-2 month', 'now')->format('Y-m-d H:i:s'),
            'version' => $num1 . '.' . $num2 . '.' . $num3,
            'description' => fake()->text(rand(400, 500)),
            'size' => rand(1, 300) . $sizeAmounts[rand(0, 2)],
        ];
    }
}
