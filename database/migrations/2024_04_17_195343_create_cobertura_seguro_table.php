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
        Schema::create('cobertura_seguro', function (Blueprint $table) {
            $table->unsignedBigInteger('seguro_id');
            $table->unsignedBigInteger('cobertura_id');
            $table->foreign('seguro_id')->references('id')->on('seguros')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cobertura_id')->references('id')->on('coberturas')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['cobertura_id', 'seguro_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cobertura_seguro');
    }
};
