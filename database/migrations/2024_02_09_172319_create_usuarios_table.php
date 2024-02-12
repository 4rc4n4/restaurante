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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('domicilio');
            $table->string('telefono_contacto');
            $table->string('email_contacto')->unique();
            $table->string('puesto');
            $table->string('numero_seguro_social')->unique();
            $table->string('RFC')->unique();
            $table->decimal('sueldo_diario', 8, 2);
            $table->foreignId('sucursal_id')->constrained('sucursales')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
