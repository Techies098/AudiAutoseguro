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
        Schema::create('solicitud_auxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('vendedor_id')->nullable();
            $table->unsignedBigInteger('auxilio_id')->nullable();
            $table->string('estado');
            $table->time('hora');
            $table->date('fecha');
            $table->string('ubicacion');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('vendedor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('auxilio_id')->references('id')->on('auxilios')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_auxes');
    }
};
