<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id');
            $table->unsignedBigInteger('cuota_id');
            $table->string('product_name');
            $table->string('quantity');
            // $table->string('amount');
            $table->decimal('amount', 10, 2);
            $table->string('currency');
            $table->string('payer_name');
            $table->string('payer_email');
            $table->string('payment_status');
            $table->string('payment_method');
            $table->string('tipo');//Prima, franquicia

            $table->foreign('cuota_id')->references('id')->on('cuotas')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unique(['payment_id', 'cuota_id']);

            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
