<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTownsTable extends Migration {

	public function up()
	{
		Schema::create('towns', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->integer('city_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('towns');
	}
}