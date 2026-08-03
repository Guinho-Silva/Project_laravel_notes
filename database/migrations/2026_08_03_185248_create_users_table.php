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
        Schema::create('users', function (Blueprint $table) {
            // Atributos e Definições da tabela

            $table->id()->autoIncrement();

            $table->string('username', 50)->nullable();

            $table->string('password', 200)->nullable();

            $table->dateTime('last_login')->nullable();
            
            // Comando para criar as colunas de data de criação e atualização
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
