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
            $table->string('User1', 50)->nullable();
            $table->double('Amount1', 11,3)->nullable();
            $table->String('Lote1', 50)->nullable();
            $table->Date('DateExpiration1')->nullable();
            $table->string('User2', 50)->nullable();
            $table->double('Amount2', 11,3)->nullable();
            $table->String('Lote2', 50)->nullable();
            $table->Date('DateExpiration2')->nullable();
            $table->string('User3', 50)->nullable();
            $table->double('Amount3', 11,3)->nullable();
            $table->String('Lote3', 50)->nullable();
            $table->Date('DateExpiration3')->nullable();
            $table->float('Difference', 10,3)->nullable();
            $table->boolean('State');
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
