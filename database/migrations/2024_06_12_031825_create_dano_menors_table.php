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
        Schema::create('dano_menors', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('detalle');
            $table->string('estado')->default('Pendiente');
            $table->unsignedBigInteger('taller_id')->nullable();
            $table->unsignedBigInteger('contrato_id');

            $table->foreign('contrato_id')->references('id')->on('contratos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('taller_id')->references('id')->on('tallers')
                ->onUpdate('cascade')->onDelete('set null');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dano_menors');
    }
};
