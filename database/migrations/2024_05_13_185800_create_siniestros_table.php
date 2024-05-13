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
            $table->string('detalle');
            $table->string('Estado');
            $table->string('Estado_ebriead');
            $table->double('Monto_siniestro', 15, 2);
            $table->double('Porcentaje_danio', 5, 2);
            $table->double('PorcentajeCulpabilidad', 5, 2);
            $table->string('tipo');
            $table->string('ubicacion');
            $table->string('url_informe');
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
