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
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('platillo_id')->constrained()->onDelete('cascade');
            $table->foreignId('venta_id')->constrained()->onDelete('cascade');
            $table->integer('Usuario_id');
            $table->integer('cantidad');
            $table->decimal('costo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
