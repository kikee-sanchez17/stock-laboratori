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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('cas')->unique(); // Campo CAS (Alfanumérico)
            $table->float('concentracio'); // Campo Concentración (Float)
            $table->enum('estat',['Sòlid','Líquid']);
            $table->string('tipus_concentracio'); // Campo Tipo de Concentración (% o mols)
            $table->float('capacitat'); // Campo Capacitat del pot (Float)
            $table->date('caducitat'); // Campo Caducitat (Fecha)
            $table->string('armari'); // Campo Armari (Alfanumérico)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
;
