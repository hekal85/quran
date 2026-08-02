<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AudioFileSeeder extends Seeder
{
    public function run(): void
    {
        $sqlPath = database_path("seeders/sql/audio_files.sql");
        
        if (file_exists($sqlPath)) {
            try {
                $sql = file_get_contents($sqlPath);
                DB::unprepared($sql);
                $this->command->info("✅ تم استيراد الملفات الصوتية من SQL");
            } catch (\Exception $e) {
                $this->command->error("❌ خطأ في استيراد SQL: " . $e->getMessage());
                Log::error("SQL Import Error (Audio Files): " . $e->getMessage());
            }
        } else {
            $this->command->warn("⚠️ ملف SQL غير موجود، سيتم التخطي");
            $this->command->info("📌 ضع ملف audio_files.sql في database/seeders/sql/");
        }
    }
}