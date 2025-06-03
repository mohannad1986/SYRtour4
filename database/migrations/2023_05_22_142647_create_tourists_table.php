<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTouristsTable extends Migration {

	public function up()
	{
		Schema::create('tourists', function(Blueprint $table) {
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
		Schema::drop('tourists');
	}
}
