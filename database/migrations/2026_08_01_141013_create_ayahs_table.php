<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("ayahs", function (Blueprint $table) {
            $table->id();
            $table->foreignId("surah_id")->constrained()->cascadeOnDelete();
            $table->integer("ayah_number");
            $table->text("text_uthmani")->nullable();
            $table->text("text_simple")->nullable();
            $table->timestamps();
            $table->unique(["surah_id", "ayah_number"]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("ayahs");
    }
};
