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
        Schema::create('maintenences', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('detailbarang_id')->references('id')->on('detailbarangs')->onDelete('CASCADE');
            $table->longText('keterangan')->nullable();
            $table->string('suplayer')->nullable();
            $table->date('tanggal_perbaikan')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenences');
    }
};
