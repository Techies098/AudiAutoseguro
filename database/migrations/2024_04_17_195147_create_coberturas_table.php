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
        Schema::create('coberturas', function (Blueprint $table) {
            $table->id();

            $table->longText('nombre');
            $table->decimal('cubre')->nullable();
            $table->char('sujeto_a_franquicia', length: 2);
            $table->decimal('limite_cobertura')->nullable();
            $table->decimal('precio'); //precio de la cobertura en porcentaje

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coberturas');
    }
};
