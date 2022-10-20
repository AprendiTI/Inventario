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
            $table->unsignedBigInteger('Model_id');
            $table->foreign('Model_id')->references('Id')->on('Modelos_recuento');
            $table->float('Difference', 10,3)->nullable();
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
