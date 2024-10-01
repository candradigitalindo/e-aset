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
        Schema::create('historis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode_barang')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('nomor_urut')->nullable();
            $table->string('merek_type')->nullable();
            $table->string('tahun_perolehan')->nullable();
            $table->string('nama_petugas')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historis');
    }
};
