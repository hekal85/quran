<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("moshafs", function (Blueprint $table) {
            $table->id();
            $table->foreignId("riwayah_id")->constrained("riwayat")->cascadeOnDelete();
            $table->string("name_arabic", 100);
            $table->string("name_english", 100);
            $table->string("script_type", 50);
            $table->integer("total_pages");
            $table->integer("total_lines_per_page")->default(15);
            $table->string("font_path", 255)->nullable();
            $table->json("metadata")->nullable();
            $table->boolean("is_active")->default(true);
            $table->timestamps();
            
            $table->index("riwayah_id");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("moshafs");
    }
};