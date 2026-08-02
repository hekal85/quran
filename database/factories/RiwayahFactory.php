<?php

namespace Database\Factories;

use App\Models\Riwayah;
use Illuminate\Database\Eloquent\Factories\Factory;

class RiwayahFactory extends Factory
{
    protected $model = Riwayah::class;

    public function definition(): array
    {
        return [
            "name_arabic" => $this->faker->name,
            "name_english" => $this->faker->word,
            "description" => $this->faker->sentence,
            "qiraat_type" => $this->faker->randomElement(["Hafs", "Warsh", "Qalon", "Al-Duri"]),
            "is_active" => true,
        ];
    }
}