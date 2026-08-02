<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("riwayat", function (Blueprint $table) {
            $table->id();
            $table->string("name_arabic", 100);
            $table->string("name_english", 100);
            $table->text("description")->nullable();
            $table->string("qiraat_type", 50);
            $table->boolean("is_active")->default(true);
            $table->timestamps();
            
            $table->index("qiraat_type");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("riwayat");
    }
};