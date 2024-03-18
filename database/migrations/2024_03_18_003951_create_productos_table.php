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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('prod_uid');
            $table->string('prod_codigo');
            $table->string('prod_nombre');
            $table->text('prod_descripcion');
            $table->integer('prod_precio');
            $table->unsignedBigInteger('prod_categoria')->nullable();
            $table->foreign('prod_categoria')->references('id')->on('categorias')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
