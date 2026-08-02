<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("reciters", function (Blueprint $table) {
            $table->id();
            $table->string("name_arabic", 100);
            $table->string("name_english", 100);
            $table->string("name_transliteration", 100);
            $table->string("biography", 500)->nullable();
            $table->string("image_path", 255)->nullable();
            $table->date("birth_date")->nullable();
            $table->date("death_date")->nullable();
            $table->string("country", 50)->nullable();
            $table->boolean("is_active")->default(true);
            $table->integer("rating")->default(0);
            $table->timestamps();
            
            $table->index("name_arabic");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("reciters");
    }
};