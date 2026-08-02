<?php

namespace Database\Factories;

use App\Models\AudioFile;
use App\Models\Reciter;
use App\Models\Riwayah;
use App\Models\Moshaf;
use App\Models\Surah;
use Illuminate\Database\Eloquent\Factories\Factory;

class AudioFileFactory extends Factory
{
    protected $model = AudioFile::class;

    public function definition(): array
    {
        $startAyah = $this->faker->numberBetween(1, 280);
        $endAyah = $startAyah + $this->faker->numberBetween(1, 10);
        
        return [
            "reciter_id" => Reciter::factory(),
            "riwayah_id" => Riwayah::factory(),
            "moshaf_id" => Moshaf::factory(),
            "surah_id" => Surah::factory(),
            "verses_range" => [$startAyah, $endAyah],
            "quality" => $this->faker->randomElement(["64", "128", "192", "320"]),
            "bitrate" => $this->faker->numberBetween(64, 320),
            "duration" => $this->faker->numberBetween(30, 1800),
            "size" => $this->faker->numberBetween(1024, 10485760),
            "format" => $this->faker->randomElement(["mp3", "flac", "opus", "m4a"]),
            "storage_driver" => $this->faker->randomElement(["local", "s3", "cdn"]),
            "path" => $this->faker->filePath(),
            "checksum" => hash("sha256", $this->faker->uuid),
            "meta_data" => [
                "waveform" => $this->faker->randomElements(range(0, 100), 100),
                "chapters" => $this->faker->randomElements(range(0, 100), 10),
            ],
            "is_verified" => $this->faker->boolean(80),
            "published_at" => $this->faker->dateTimeThisYear(),
        ];
    }
}