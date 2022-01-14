<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order', function (Blueprint $table) {
            $table->dropColumn('invoice');
            $table->integer('document_b1_id')->unsigned()->nullable()->after('order_b1');
            $table->foreign('document_b1_id')->references('id')->on('document_b1')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order', function (Blueprint $table) {
           $table->string('invoice')->nullable();
           $table->dropColumn('document_b1_id');
        });
    }
}
