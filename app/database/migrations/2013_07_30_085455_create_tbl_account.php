<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblAccount extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_account', function(Blueprint $table) {
            $table->increments('id');
            $table->string('keyword');
			$table->string('name');
			$table->string('url');
			$table->boolean('active');
            $table->timestamps();

            $table->unique('keyword');
            $table->unique('url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_account');
    }

}
