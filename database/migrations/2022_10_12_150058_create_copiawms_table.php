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
            $table->String('Descirption', 50);
            $table->String('BarCode', 45);
            $table->Integer('Amount');
            $table->String('Lote', 50);
            $table->DateTime('DateExpiration');
            $table->String('Zone', 50);
            $table->String('Hallway', 50);
            $table->String('Compartment', 50);
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
