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
        Schema::create('wasted_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->integer('qty')->default(1);
            $table->bigInteger(('actual_price'));
            $table->bigInteger(('price'));
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
        Schema::dropIfExists('wasted_items');
    }
};
