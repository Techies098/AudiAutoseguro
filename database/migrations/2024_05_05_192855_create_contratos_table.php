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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('vehiculo_id');
            $table->unsignedBigInteger('vendedor_id'); //vendedores_id
            $table->unsignedBigInteger('seguro_id');
            $table->double('costofranquicia');
            $table->double('costoprima');
            $table->integer('nro_cuotas');
            $table->string('tipovigencia');
            $table->date('vigenciainicio');
            $table->date('vigenciafin');
            $table->string('estado');

            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('vendedor_id')->references('id')->on('vendedores');
            $table->foreign('seguro_id')->references('id')->on('seguros');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
