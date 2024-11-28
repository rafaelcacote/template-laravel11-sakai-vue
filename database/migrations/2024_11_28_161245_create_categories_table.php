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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Cria a coluna id com auto incremento
            $table->string('name', 100); // Coluna 'name' com até 100 caracteres
            $table->text('description'); // Coluna 'description' do tipo texto
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Chave estrangeira para a tabela 'users'

            $table->timestamps(); // Cria as colunas created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
