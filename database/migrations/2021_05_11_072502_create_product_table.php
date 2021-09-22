<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('supplier_reference')->nullable();
            $table->string('reference');
            $table->integer('stock_shop')->default(0);
            $table->integer('stock_supplier')->default(0);
            $table->integer('discount_product')->default(0);
            $table->integer('tax_id')->default(1);
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
            $table->decimal('price')->default(0);

            $table->integer('discount_global')->unsigned()->nullable();
            $table->foreign('discount_global')->references('id')->on('discount')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('product');
    }
}
