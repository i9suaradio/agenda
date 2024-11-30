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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idcliente')->constrained('clientes')->onDelete('cascade');
            $table->string('nome', 255);
            $table->string('raca', 255);
            $table->text('observacao')->nullable();
            $table->decimal('valorpacote', 10, 2);
            $table->tinyInteger('frequencia'); // Valores permitidos: 7, 15, 30
            $table->boolean('taxidog')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
