<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("reciter_riwayah", function (Blueprint $table) {
            $table->id();
            $table->foreignId("reciter_id")->constrained()->cascadeOnDelete();
            $table->foreignId("riwayah_id")->constrained("riwayat")->cascadeOnDelete();
            $table->boolean("is_primary")->default(false);
            $table->integer("order")->default(0);
            $table->timestamps();
            
            $table->unique(["reciter_id", "riwayah_id"]);
            $table->index(["reciter_id", "is_primary"]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("reciter_riwayah");
    }
};