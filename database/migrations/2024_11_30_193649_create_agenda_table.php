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
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idcliente')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('idpet')->constrained('pets')->onDelete('cascade');
            $table->string('servico', 20);
            $table->date('data');
            $table->date('datapago')->nullable();
            $table->text('observacao')->nullable();
            $table->decimal('valor', 10, 2);
            $table->string('status', 20);
            $table->boolean('arquivado')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
};
