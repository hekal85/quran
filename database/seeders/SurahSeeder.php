<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SurahSeeder extends Seeder
{
    public function run(): void
    {
        $sqlPath = database_path("seeders/sql/surahs.sql");
        
        if (file_exists($sqlPath)) {
            try {
                $sql = file_get_contents($sqlPath);
                DB::unprepared($sql);
                $this->command->info("✅ تم استيراد السور من SQL");
            } catch (\Exception $e) {
                $this->command->error("❌ خطأ في استيراد SQL: " . $e->getMessage());
                Log::error("SQL Import Error (Surahs): " . $e->getMessage());
            }
        } else {
            $this->command->warn("⚠️ ملف SQL غير موجود، سيتم استخدام Factory");
            \App\Models\Surah::factory(114)->create();
        }
    }
}