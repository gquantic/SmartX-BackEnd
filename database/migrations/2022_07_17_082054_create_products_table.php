<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('image');
            $table->string('name');
            $table->text('description')->nullable();
            $table->longText('full_description')->nullable();

            $table->integer('award')->default(3);
            $table->integer('need_funds')->comment('Необходимые средства');
            $table->integer('shares')->comment('Доступные доли');

            $table->date('end_date')->comment('Дата окончания');

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
        Schema::dropIfExists('products');
    }
}
