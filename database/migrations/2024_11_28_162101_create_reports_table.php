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
        Schema::create('reports', function (Blueprint $table) {
            $table->id('report_id'); // Cria a coluna 'report_id' com auto incremento
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Chave estrangeira para 'users'
            $table->dateTime('start_date'); // Coluna 'start_date' do tipo DATETIME
            $table->dateTime('end_date'); // Coluna 'end_date' do tipo DATETIME
            $table->decimal('total_expenses', 10, 2); // Coluna 'total_expenses' com tipo DECIMAL (10, 2)

            $table->timestamps(); // Cria as colunas 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
