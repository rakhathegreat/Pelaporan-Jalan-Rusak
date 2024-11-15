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
        Schema::create('laporan_jalan', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->date('tanggal');
            $table->string('nama_jalan');
            $table->string('kota');
            $table->string('kelurahan');
            $table->string('lingkungan');
            $table->string('rt');
            $table->string('rw');
            $table->string('koordinat');
            $table->integer('panjang_jalan');
            $table->integer('lebar_jalan');
            $table->string('kondisi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
