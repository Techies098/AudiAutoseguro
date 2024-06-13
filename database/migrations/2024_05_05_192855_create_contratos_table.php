<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

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
            //$table->unsignedBigInteger('user_id'); //Solo vendedor y adminstrador
            $table->unsignedBigInteger('seguro_id');
            $table->double('costofranquicia');
            $table->double('costoprima');
            $table->integer('nro_cuotas');
            $table->string('tipovigencia');
            $table->date('vigenciainicio');
            $table->date('vigenciafin');
            $table->string('estado')->default('Inactivo');


            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('vendedor_id')->references('id')->on('vendedores');
            //$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreign('user_id')->references('id')->on('users');
            $table->foreign('seguro_id')->references('id')->on('seguros');

            $table->timestamps();
        });
        // Configura el inicio de la secuencia del ID en 1000
        DB::statement('ALTER TABLE contratos AUTO_INCREMENT = 1001;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};