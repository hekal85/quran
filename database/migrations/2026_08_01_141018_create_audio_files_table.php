<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("audio_files", function (Blueprint $table) {
            $table->id();
            $table->foreignId("reciter_id")->constrained()->cascadeOnDelete();
            $table->foreignId("riwayah_id")->constrained("riwayat")->cascadeOnDelete();
            $table->foreignId("moshaf_id")->constrained()->cascadeOnDelete();
            $table->foreignId("surah_id")->constrained()->cascadeOnDelete();
            $table->foreignId("recitation_style_id")->nullable()->constrained("recitation_styles")->nullOnDelete();
            
            $table->json("verses_range")->comment("[start_ayah_id, end_ayah_id]");
            
            $table->string("quality", 20)->default("128");
            $table->integer("bitrate")->nullable();
            $table->integer("duration")->unsigned();
            $table->integer("size")->unsigned();
            $table->string("format", 10);
            
            $table->string("storage_driver")->default("local");
            $table->string("path", 500);
            $table->string("checksum", 64)->unique();
            
            $table->json("meta_data")->nullable();
            
            $table->boolean("is_verified")->default(false);
            $table->timestamp("published_at")->nullable();
            $table->timestamps();
            
            $table->index(["reciter_id", "riwayah_id", "surah_id"]);
            $table->index("quality");
            $table->index("format");
            $table->index("is_verified");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("audio_files");
    }
};