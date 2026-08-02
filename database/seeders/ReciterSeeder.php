<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReciterSeeder extends Seeder
{
    public function run(): void
    {
        $sqlPath = database_path("seeders/sql/reciters.sql");
        
        if (file_exists($sqlPath)) {
            try {
                $sql = file_get_contents($sqlPath);
                DB::unprepared($sql);
                $this->command->info("✅ تم استيراد القراء من SQL");
            } catch (\Exception $e) {
                $this->command->error("❌ خطأ في استيراد SQL: " . $e->getMessage());
                Log::error("SQL Import Error (Reciters): " . $e->getMessage());
            }
        } else {
            $this->command->warn("⚠️ ملف SQL غير موجود، سيتم استخدام Factory");
            \App\Models\Reciter::factory(30)->create();
        }
    }
}