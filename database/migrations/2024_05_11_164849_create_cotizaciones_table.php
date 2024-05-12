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
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('seguro_id');
            $table->foreign('seguro_id')->references('id')->on('seguros')->onUpdate('cascade')->onDelete('cascade');

            $table->string('name');
            $table->string('email');
            $table->string('telefono')->nullable();
            $table->year('year');
            $table->decimal('precio', 9, 2);
            $table->string('marca');
            $table->string('modelo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};
