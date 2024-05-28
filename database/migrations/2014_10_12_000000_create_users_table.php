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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('level_users_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('domisilis_id')->nullable()->constrained()->onDelete('cascade');
            $table->enum('kependudukan',['warga tetap','warga pendatang'])->nullable();
            $table->char('no_KK')->nullable();
            $table->char('NIK')->unique()->nullable();
            $table->enum('jenis_kelamin',['laki-laki','perempuan'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('agama',['islam','protestan','katholik','hindu','budha','khonghucu'])->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('jenis_pekerjaan')->nullable();
            $table->enum('status',['kawin','belum kawin'])->nullable();
            $table->char('profile')->nullable();
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
