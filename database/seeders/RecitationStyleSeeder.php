<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RecitationStyleSeeder extends Seeder
{
    public function run(): void
    {
        $sqlPath = database_path("seeders/sql/recitation_styles.sql");
        
        if (file_exists($sqlPath)) {
            try {
                $sql = file_get_contents($sqlPath);
                DB::unprepared($sql);
                $this->command->info("✅ تم استيراد أنماط التلاوة من SQL");
            } catch (\Exception $e) {
                $this->command->error("❌ خطأ في استيراد SQL: " . $e->getMessage());
                Log::error("SQL Import Error (Recitation Styles): " . $e->getMessage());
            }
        } else {
            $this->command->warn("⚠️ ملف SQL غير موجود، سيتم استخدام البيانات الافتراضية");
            $styles = [
                ["name_arabic" => "ترتيل", "name_english" => "Tartil", "description" => "القراءة بتؤدة وترسل"],
                ["name_arabic" => "تجويد", "name_english" => "Tajweed", "description" => "القراءة بأحكام التجويد"],
                ["name_arabic" => "معلم", "name_english" => "Teacher", "description" => "قراءة بطيئة مع تكرار الآيات"],
                ["name_arabic" => "مترجم", "name_english" => "Translated", "description" => "قراءة مصحوبة بترجمة المعاني"],
            ];
            foreach ($styles as $item) {
                DB::table("recitation_styles")->insert($item + [
                    "is_active" => true,
                    "created_at" => now(),
                    "updated_at" => now(),
                ]);
            }
        }
    }
}