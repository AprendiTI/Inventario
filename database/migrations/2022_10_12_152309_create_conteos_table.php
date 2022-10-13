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
        Schema::create('Conteos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Copia_id');
            $table->foreign('Copia_id')->references('id')->on('CopiaWMS');
            $table->integer('Amount1');
            $table->integer('Amount2');
            $table->integer('Amount3');
            $table->unsignedBigInteger('User_id');
            $table->foreign('User_id')->references('id')->on('Users');
            $table->float('Difference', 10,3);
            $table->float('Detour', 10,3);
            $table->unsignedBigInteger('Model_id');
            $table->foreign('Model_id')->references('Id')->on('Modelos_recuento');
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
        Schema::dropIfExists('Conteos');
    }
};
