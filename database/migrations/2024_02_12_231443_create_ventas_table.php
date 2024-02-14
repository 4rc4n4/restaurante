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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('sucurlsal_id')->constrain()->onDelete('cascade');
            $table->foreignId('usuario_id')->constrained()->onDelete('cascade');
            $table->integer('status');//cuando sea 0 es venta abierta,1= cerrada, 2=cancelada
            $table->integer('mesa'); //numero de mesa
            $table->decimal('total',8,2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
