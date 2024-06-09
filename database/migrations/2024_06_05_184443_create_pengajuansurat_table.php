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
        Schema::create('pengajuansurat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengaju');
            $table->bigInteger('NIK');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('pekerjaan');
            $table->enum('status', ['Menikah', 'Belum Menikah']);
            $table->string('alamat');
            $table->string('keperluan');
            $table->string('rt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuansurat_migrations');
    }
};
