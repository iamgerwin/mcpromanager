<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblUnknown extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_unknown', function(Blueprint $table) {
            $table->increments('id');
            $table->string('from');
			$table->text('message');
			$table->string('datetime');
                                            $table->string('from_ip');
                                            $table->string('remarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_unknown');
    }

}
