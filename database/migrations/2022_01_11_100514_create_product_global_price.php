<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductGlobalPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_global_price', function (Blueprint $table) {
            $table->integer('product_id')->unsigned()->nullable(false);
            $table->foreign('product_id')->references('id')->on('product')->onUpdate('cascade')->onDelete('cascade');

            $table->decimal('price')->nullable(false);


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
        Schema::dropIfExists('product_global_price');
    }
}
