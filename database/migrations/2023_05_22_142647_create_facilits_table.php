<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacilitsTable extends Migration {

	public function up()
	{
		Schema::create('facilits', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->integer('town_id')->unsigned();
			$table->integer('owner_id')->unsigned()->nullable()->change();;
			// $table->integer('owner_id')->unsigned()->nullable();
			$table->integer('category_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('facilits');
	}
}
