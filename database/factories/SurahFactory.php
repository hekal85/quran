<?php

namespace Database\Factories;

use App\Models\Surah;
use Illuminate\Database\Eloquent\Factories\Factory;

class SurahFactory extends Factory
{
    protected $model = Surah::class;

    public function definition(): array
    {
        $surahNumber = $this->faker->unique()->numberBetween(1, 114);
        $isMakki = $this->faker->boolean(70);
        
        return [
            "surah_number" => $surahNumber,
            "name_arabic" => $this->faker->name,
            "name_english" => $this->faker->word,
            "name_transliteration" => $this->faker->word,
            "total_verses" => $this->faker->numberBetween(3, 286),
            "revelation_place" => $isMakki ? "Makkah" : "Madinah",
            "juz_start" => $this->faker->randomElement(["1", "2", "3", "4", "5"]),
            "juz_end" => $this->faker->randomElement(["6", "7", "8", "9", "10"]),
            "is_makki" => $isMakki,
        ];
    }
}