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
        Schema::create('cuotas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->decimal('monto', 10, 2);
            $table->date('fecha_por_pagar');
            $table->date('fecha_pagada')->nullable();
            $table->string('estado')->default('Pendiente');
            $table->unsignedBigInteger('contrato_id');

            $table->foreign('contrato_id')->references('id')->on('contratos')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unique(['numero', 'contrato_id']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuotas');
    }
};
