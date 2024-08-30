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
        Schema::create('pivot_ac_ucs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unidade_curricular_id')->constrained();
            $table->foreignId('area_de_conhecimento_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_ac_ucs');
    }
};
