<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("translations", function (Blueprint $table) {
            $table->id();
            $table->foreignId("ayah_id")->constrained()->cascadeOnDelete();
            $table->string("language_code", 10);
            $table->string("translator_name", 100);
            $table->text("translation_text");
            $table->boolean("is_approved")->default(false);
            $table->timestamps();
            
            $table->unique(["ayah_id", "language_code", "translator_name"]);
            $table->index("language_code");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("translations");
    }
};