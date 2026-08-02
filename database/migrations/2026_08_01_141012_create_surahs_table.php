<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("surahs", function (Blueprint $table) {
            $table->id();
            $table->tinyInteger("surah_number")->unique();
            $table->string("name_arabic", 50);
            $table->string("name_english", 50);
            $table->string("name_transliteration", 50);
            $table->smallInteger("total_verses");
            $table->string("revelation_place", 20);
            $table->string("juz_start", 10);
            $table->string("juz_end", 10);
            $table->boolean("is_makki")->default(true);
            $table->timestamps();
            
            $table->index("surah_number");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("surahs");
    }
};