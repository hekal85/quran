<?php

namespace Database\Factories;

use App\Models\Reciter;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReciterFactory extends Factory
{
    protected $model = Reciter::class;

    public function definition(): array
    {
        return [
            "name_arabic" => $this->faker->name,
            "name_english" => $this->faker->name,
            "name_transliteration" => $this->faker->name,
            "biography" => $this->faker->paragraph,
            "image_path" => $this->faker->imageUrl(200, 200),
            "birth_date" => $this->faker->dateTimeBetween("-80 years", "-30 years"),
            "death_date" => $this->faker->optional()->dateTimeBetween("-20 years", "now"),
            "country" => $this->faker->country,
            "is_active" => $this->faker->boolean(90),
            "rating" => $this->faker->numberBetween(0, 100),
        ];
    }
}