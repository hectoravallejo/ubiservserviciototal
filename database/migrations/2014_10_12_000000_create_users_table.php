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
        $table->id();
        $table->string('name');
        $table->string('address')->nullable(); // Permite valores nulos
        $table->string('whatsapp')->nullable(); // Permite valores nulos
        $table->string('photo')->nullable();
        $table->string('email')->unique(); // Debe ser único
        $table->string('password'); // No debe tener un valor predeterminado
        $table->timestamps();
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


