<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cargo')->nullable(true);
            $table->string('departamento')->nullable(true);
            $table->string('facultad')->nullable(true);
            $table->string('telefono')->nullable(true);
            $table->string('fax')->nullable(true);
            $table->string('compania')->nullable(true);
            $table->string('correo')->nullable(true);
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
        Schema::dropIfExists('datos');
    }
}
