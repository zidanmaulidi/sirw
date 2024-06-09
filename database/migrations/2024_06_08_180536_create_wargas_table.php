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
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('alamat');
            $table->string('no_telepon');
            $table->char('no_KK')->nullable();
            $table->char('NIK')->unique()->nullable();
            $table->enum('jenis_kelamin',['laki-laki','perempuan'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('agama',['islam','protestan','katholik','hindu','budha','khonghucu'])->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('jenis_pekerjaan')->nullable();
            $table->enum('status',['kawin','belum kawin'])->nullable();
            $table->foreignId('domisilis_id')->nullable()->constrained()->onDelete('cascade'); // domisilis_id = 1 adalah warga RT 10, dan domisilis_id = 2 adalah warga RT 11
            $table->enum('kependudukan',['warga tetap','warga pendatang'])->nullable();
            $table->char('profile')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wargas');
    }
};
