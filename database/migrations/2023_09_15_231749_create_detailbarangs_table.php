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
        Schema::create('detailbarangs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('ruangan_id')->references('id')->on('ruangans')->onDelete('CASCADE');
            $table->foreignUuid('barang_id')->references('id')->on('barangs')->onDelete('CASCADE');
            $table->bigInteger('nomor_urut')->nullable();
            $table->string('merek_type')->nullable();
            $table->string('tahun_perolehan')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('status')->default('Baik')->comment('Baik, Rusak, Retur, Jual, Perbaiki');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailbarangs');
    }
};
