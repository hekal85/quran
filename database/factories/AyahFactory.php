<?php

namespace Database\Factories;

use App\Models\Ayah;
use App\Models\Surah;
use Illuminate\Database\Eloquent\Factories\Factory;

class AyahFactory extends Factory
{
    protected $model = Ayah::class;

    public function definition(): array
    {
        return [
            "surah_id" => Surah::factory(),
            "ayah_number" => $this->faker->unique()->numberBetween(1, 286),
            "juz_number" => $this->faker->numberBetween(1, 30),
            "hizb_number" => $this->faker->numberBetween(1, 60),
            "rub_number" => $this->faker->numberBetween(1, 240),
            "text_arabic" => $this->faker->text(200),
            "text_uthmani" => $this->faker->text(200),
            "text_simple" => $this->faker->text(200),
            "text_emlaey" => $this->faker->text(200),
            "page_number" => $this->faker->numberBetween(1, 604),
        ];
    }
}