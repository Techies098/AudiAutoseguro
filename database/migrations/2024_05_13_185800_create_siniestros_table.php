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
        Schema::create('siniestros', function (Blueprint $table) {
            $table->id();
            $table->string('detalle')->nullable();
            $table->string('estado')->default('Espera');
            $table->string('estado_ebriedad')->nullable();
            $table->double('monto_siniestro', 15, 2)->nullable();
            $table->double('porcentaje_danio', 5, 2)->nullable();
            $table->double('porcentajeCulpabilidad', 5, 2)->nullable();
            $table->string('ubicacion');
            $table->foreignId('tipo_de_siniestro_id')->constrained('tipo_de_siniestros');
            $table->foreignId('contrato_id')->constrained('contratos');
            $table->foreignId('perito_id')->nullable()->constrained('peritos');
            $table->foreignId('administrador_id')->nullable()->constrained('administradores');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siniestros');
    }
};
