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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('Nome', 255);
            $table->string('Endereco', 255);
            $table->string('Telefone', 15);
            $table->text('Observacao')->nullable();
            $table->tinyInteger('DiaBanho'); // 0-6 representando os dias da semana
            $table->unsignedBigInteger('ordemtaxidog')->nullable();
            $table->boolean('ativo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
