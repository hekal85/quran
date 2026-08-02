<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RiwayahSeeder extends Seeder
{
    public function run(): void
    {
        $sqlPath = database_path("seeders/sql/riwayat.sql");
        
        if (file_exists($sqlPath)) {
            try {
                $sql = file_get_contents($sqlPath);
                DB::unprepared($sql);
                $this->command->info("✅ تم استيراد الروايات من SQL");
            } catch (\Exception $e) {
                $this->command->error("❌ خطأ في استيراد SQL: " . $e->getMessage());
                Log::error("SQL Import Error (Riwayat): " . $e->getMessage());
            }
        } else {
            $this->command->warn("⚠️ ملف SQL غير موجود، سيتم استخدام البيانات الافتراضية");
            $riwayat = [
                ["name_arabic" => "حفص عن عاصم", "name_english" => "Hafs", "qiraat_type" => "Hafs"],
                ["name_arabic" => "ورش عن نافع", "name_english" => "Warsh", "qiraat_type" => "Warsh"],
                ["name_arabic" => "قالون عن نافع", "name_english" => "Qalon", "qiraat_type" => "Qalon"],
                ["name_arabic" => "الدوري عن أبي عمرو", "name_english" => "Al-Duri", "qiraat_type" => "Al-Duri"],
            ];
            foreach ($riwayat as $item) {
                DB::table("riwayat")->insert($item + [
                    "is_active" => true,
                    "created_at" => now(),
                    "updated_at" => now(),
                ]);
            }
        }
    }
}