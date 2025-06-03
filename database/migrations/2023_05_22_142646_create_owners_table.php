<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOwnersTable extends Migration {

	public function up()
	{
		Schema::create('owners', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('Phone_num')->nullable();;

		});
	}

	public function down()
	{
		Schema::drop('owners');
	}
}
