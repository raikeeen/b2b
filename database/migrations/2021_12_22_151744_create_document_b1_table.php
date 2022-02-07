<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentB1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_b1', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(true);
            $table->decimal('price',8,2)->default(0.00);

            $table->integer('status_id')->unsigned()->default(1);
            $table->foreign('status_id')->references('id')->on('document_b1_status')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('document_b1');
    }
}
