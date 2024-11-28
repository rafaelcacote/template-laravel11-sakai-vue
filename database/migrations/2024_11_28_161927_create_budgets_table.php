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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id(); // Cria a coluna 'id' com auto incremento
            $table->decimal('amount', 10, 2); // Coluna 'amount' com tipo DECIMAL, 10 dígitos no total e 2 casas decimais
            $table->dateTime('start_date'); // Coluna 'start_date' do tipo DATETIME
            $table->dateTime('end_date'); // Coluna 'end_date' do tipo DATETIME
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Chave estrangeira para 'categories'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Chave estrangeira para 'users'

            $table->timestamps(); // Cria as colunas 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
