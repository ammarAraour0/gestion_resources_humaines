<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('position'); // Poste
            $table->string('region'); // Région
            $table->string('province'); // Province
            $table->date('start_date'); // Date de début
            $table->date('end_date')->nullable(); // Date de fin (optionnelle)
            $table->text('details')->nullable(); // Détails supplémentaires
            $table->timestamps();
        });
    }
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
