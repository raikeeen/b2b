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
            $table->decimal('trade_margin',8,2)->default(0);
            $table->integer('tax_id')->default(1);
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
            $table->decimal('price',8,2)->default(0);

            $table->integer('discount_id')->unsigned()->default(1);
            $table->foreign('discount_id')->references('id')->on('discount')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('supplier_id')->unsigned()->nullable();
            $table->foreign('supplier_id')->references('id')->on('supplier')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('margin_id')->unsigned()->nullable()->default(1);
            $table->foreign('margin_id')->references('id')->on('margin')->onUpdate('cascade')->onDelete('cascade');

          /*  $table->integer('cat_trade_margin')->unsigned()->nullable();
            $table->foreign('cat_trade_margin')->references('id')->on('product_cat')->onUpdate('cascade')->onDelete('cascade');*/



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
