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
        Schema::table('maintenences', function (Blueprint $table) {
            $table->string('kode_barang')->nullable()->after('detailbarang_id');
            $table->string('nama_barang')->nullable()->after('kode_barang');
            $table->string('merek_type')->nullable()->after('nama_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('maintenences', function (Blueprint $table) {
            $table->dropColumn('kode_barang');
            $table->dropColumn('nama_barang');
            $table->dropColumn('merek_type');
        });
    }
};
