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
        Schema::create('clausula_seguro', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('clausula_id');
            $table->unsignedBigInteger('seguro_id');

            $table->foreign('clausula_id')->references('id')->on('clausulas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('seguro_id')->references('id')->on('seguros')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clausula_seguro');
    }
};
