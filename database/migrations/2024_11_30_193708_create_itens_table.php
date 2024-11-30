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
        Schema::create('itens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idagenda')->nullable()->constrained('agenda')->onDelete('cascade');
            $table->foreignId('idcliente')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('idpet')->constrained('pets')->onDelete('cascade');
            $table->text('descricao');
            $table->decimal('valor', 10, 2);
            $table->decimal('pagamentoparcial', 10, 2)->nullable();
            $table->date('data');
            $table->date('datapago')->nullable();
            $table->boolean('pago')->default(false);
            $table->boolean('arquivado')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens');
    }
};
