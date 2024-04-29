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
        Schema::create('consums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuari_id');
            $table->foreign('usuari_id')->references('id')->on('users');
            $table->dateTime('data');
            $table->string('cas');
            $table->string('concentracio');
            $table->enum('motiu', ['consum', 'regularització', 'Altres']);
            $table->decimal('consum', 10, 2);
            $table->unsignedBigInteger('product_id'); // Referencia al producto consumido
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consums');
    }
};
