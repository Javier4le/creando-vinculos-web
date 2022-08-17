<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juntas_vecinos', function (Blueprint $table) {
            $table->id();
            $table->string('unidad_vecinal');
            $table->string('direccion');
            $table->string('sector')->nullable();
            $table->string('representante')->nullable();
            $table->string('email')->nullable();
            $table->string('horario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juntas_vecinos');
    }
};
