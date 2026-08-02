<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info("🌱 بدء تشغيل الـ Seeders...");
        
        $this->call([
            SurahSeeder::class,
            AyahSeeder::class,
            RiwayahSeeder::class,
            ReciterSeeder::class,
            RecitationStyleSeeder::class,
            MoshafSeeder::class,      // <-- هذا هو المفقود!
            AudioFileSeeder::class,
        ]);
        
        $this->command->info("✅ تم الانتهاء من جميع الـ Seeders");
    }
}