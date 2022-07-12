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
        Schema::create('today_histories', function (Blueprint $table) {
            $table->id();
            $table->string('random_values');
            $table->foreignId('inventory_id')->references('id')->on('inventories')->cascadeOnDelete();
            $table->tinyInteger('qty')->default(1);
            $table->text('note')->nullable();
            $table->bigInteger('sub_total');
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
        Schema::dropIfExists('today_histories');
    }
};
