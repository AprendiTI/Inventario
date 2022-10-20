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
        Schema::create('CopiaWMS', function (Blueprint $table) {
            $table->id();
            $table->String('ItemCode', 50);
            $table->String('Description', 100);
            $table->String('BarCode', 500);
            $table->double('Amount', 11,3);
            $table->String('Lote', 50);
            $table->Date('DateExpiration');
            $table->String('Zone', 50);
            $table->String('Hallway', 50);
            $table->String('Location', 50);
            $table->double('Compartment', 15,0);
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
        Schema::dropIfExists('CopiaWMS');
    }
};
