<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenipakOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venipak_order', function (Blueprint $table) {
            $table->increments('id');

            $table->double('weight',10,2)->default(1.00)->nullable(false);
            $table->string('label')->nullable(true);
            $table->string('doc')->nullable(true);
            $table->tinyInteger('is_cod')->default(0);
            $table->decimal('cod_amount',8,2)->default(0.00);
            $table->string('delivery_time')->default('nwd')->nullable(false);
            $table->tinyInteger('call')->default(0);
            $table->tinyInteger('is_global')->default(0);

            $table->integer('delivery_id')->unsigned()->nullable(false)->default(2);
            $table->foreign('delivery_id')->references('id')->on('delivery')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('order_id')->unsigned()->nullable(false);
            $table->foreign('order_id')->references('id')->on('order')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('manifest_id')->unsigned()->nullable(false);
            $table->foreign('manifest_id')->references('id')->on('venipak_manifest')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('venipak_order');
    }
}
