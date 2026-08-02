<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("recitation_styles", function (Blueprint $table) {
            $table->id();
            $table->string("name_arabic", 50);
            $table->string("name_english", 50);
            $table->text("description")->nullable();
            $table->boolean("is_active")->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("recitation_styles");
    }
};