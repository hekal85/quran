<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("bookmarks", function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->cascadeOnDelete();
            $table->foreignId("audio_file_id")->constrained()->cascadeOnDelete();
            $table->foreignId("ayah_id")->constrained()->cascadeOnDelete();
            $table->integer("position")->default(0);
            $table->text("note")->nullable();
            $table->boolean("is_public")->default(false);
            $table->timestamps();
            
            $table->unique(["user_id", "audio_file_id", "ayah_id"]);
            $table->index(["user_id", "is_public"]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("bookmarks");
    }
};