<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable()->default(null)->change();
            $table->integer('limit')->default(1000)->after('surname');
            $table->integer('term')->default(7)->after('limit');
            $table->string('note')->nullable()->default(null)->after('term');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('limit');
            $table->dropColumn('term');
            $table->dropColumn('note');
        });
    }
}
