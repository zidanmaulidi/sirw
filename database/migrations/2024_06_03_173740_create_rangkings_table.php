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
        Schema::create('rangkings', function (Blueprint $table) {
            $table->id();
            $table->char('alternatif')->nullable();
            $table->decimal('skor', 10, 2)->nullable();
            $table->integer('rangking')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rangkings');
    }
};
