<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfitProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profit_products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned();
            $table->bigInteger('income')->unsigned();
            $table->bigInteger('cost')->unsigned();
            $table->bigInteger('profit');
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
        Schema::dropIfExists('profit_products');
    }
}
