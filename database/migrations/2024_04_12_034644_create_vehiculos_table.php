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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cliente_id');
            $table->string('marca');
            $table->string('modelo');
            $table->string('clase');
            $table->string('color');
            $table->string('placa')->unique();
            $table->string('chasis')->unique();
            $table->string('motor')->unique();
            $table->string('traccion');
            $table->string('anio');
            $table->string('uso');
            $table->string('nro_asientos');
            $table->string('combustible');
            $table->double('valor_comercial');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
