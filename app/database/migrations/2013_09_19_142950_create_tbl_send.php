<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblSend extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_send', function(Blueprint $table) {
			$table->increments('id');
			$table->string('keyword')->unique();
			$table->string('name')->unique();
			$table->boolean('active')->default(1);
			$table->string('ip')->default('127.0.0.1');
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
		Schema::drop('tbl_send');
	}

}
