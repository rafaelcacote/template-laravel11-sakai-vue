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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id(); // Cria a coluna 'id' com auto incremento
            $table->decimal('amount', 10, 2); // Coluna 'amount' com tipo DECIMAL e 2 casas decimais
            $table->text('description'); // Coluna 'description' do tipo TEXT
            $table->dateTime('expense_date'); // Coluna 'expense_date' do tipo DATETIME
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Chave estrangeira para 'categories'
            $table->foreignId('payment_method_id')->constrained('payment_methods')->onDelete('cascade'); // Chave estrangeira para 'payment_methods'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Chave estrangeira para 'users'

            $table->timestamps(); // Cria as colunas 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
