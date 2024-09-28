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
            $table->foreignId('producto_id')->constrained()->onDelete('cascade'); // Asegúrate de que esta línea esté presente
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade'); // Asegúrate de que esta línea esté presente
            $table->integer('cantidad');
            $table->decimal('precio_venta', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ventas');
    }
};
