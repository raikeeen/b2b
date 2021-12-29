<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenipakOrderStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venipak_order_status', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('status_id')->unsigned()->nullable(false)->default(1);
            $table->foreign('status_id')->references('id')->on('venipak_status')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('venipak_order_id')->unsigned()->nullable(false);
            $table->foreign('venipak_order_id')->references('id')->on('venipak_order')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('venipak_order_status');
    }
}
