<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("tafsir", function (Blueprint $table) {
            $table->id();
            $table->foreignId("ayah_id")->constrained()->cascadeOnDelete();
            $table->string("tafsir_name", 100);
            $table->string("author_name", 100);
            $table->text("tafsir_text");
            $table->json("references")->nullable();
            $table->boolean("is_approved")->default(false);
            $table->timestamps();
            
            $table->index(["ayah_id", "tafsir_name"]);
            $table->index("author_name");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("tafsir");
    }
};