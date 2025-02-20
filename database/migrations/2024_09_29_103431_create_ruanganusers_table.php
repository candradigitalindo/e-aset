<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ruanganusers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreignUuid('ruangan_id')->references('id')->on('ruangans')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruanganusers');
    }
};
