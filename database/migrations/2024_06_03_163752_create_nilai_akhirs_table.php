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
        Schema::create('nilai_akhirs', function (Blueprint $table) {
            $table->id();
            $table->char('alternatif')->nullable();
            $table->decimal('kondisi_rumah', 10, 2)->nullable();
            $table->decimal('kondisi_air', 10, 2)->nullable();
            $table->decimal('penghasilan', 10, 2)->nullable();
            $table->decimal('tegangan_listrik', 10, 2)->nullable();
            $table->decimal('pendidikan', 10, 2)->nullable();
            $table->decimal('pekerjaan', 10, 2)->nullable();
            $table->decimal('sumber_air', 10, 2)->nullable();
            $table->decimal('bahan_bakar_memasak', 10, 2)->nullable();
            $table->decimal('umur', 10, 2)->nullable();
            $table->decimal('tanggungan', 10, 2)->nullable();
            $table->decimal('total_score', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai__akhirs');
    }
};
