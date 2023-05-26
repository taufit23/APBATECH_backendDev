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
        Schema::create('antrian_soals', function (Blueprint $table) {
            $table->id('int');
            $table->string('nomorantrean')->nullable();
            $table->string('angkaantrean')->nullable();
            $table->string('norm')->nullable();
            $table->string('namapoli')->nullable();
            $table->string('kodepoli')->nullable();
            $table->string('tglpriksa')->nullable();
            $table->string('nomorkartu')->nullable();
            $table->string('nik')->nullable();
            $table->string('keluhan')->nullable();
            $table->integer('statusdipanggil')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antrian_soals');
    }
};
