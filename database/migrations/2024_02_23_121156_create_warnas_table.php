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
        Schema::create('warnas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_warna')->unique();
            $table->string('nama_warna');
            $table->text('deskripsi')->nullable();
            $table->string('nilai_rgb');
            $table->string('nilai_hex');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warnas');
    }
};
