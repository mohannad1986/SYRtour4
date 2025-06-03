<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('towns', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('citys')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('facilits', function(Blueprint $table) {
			$table->foreign('town_id')->references('id')->on('towns')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('facilits', function(Blueprint $table) {
			$table->foreign('owner_id')->references('id')->on('owners')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('facilits', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('cits_categors', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('citys')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('cits_categors', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('towns', function(Blueprint $table) {
			$table->dropForeign('towns_city_id_foreign');
		});
		Schema::table('facilits', function(Blueprint $table) {
			$table->dropForeign('facilits_town_id_foreign');
		});
		Schema::table('facilits', function(Blueprint $table) {
			$table->dropForeign('facilits_owner_id_foreign');
		});
		Schema::table('facilits', function(Blueprint $table) {
			$table->dropForeign('facilits_category_id_foreign');
		});
		Schema::table('cits_categors', function(Blueprint $table) {
			$table->dropForeign('cits_categors_city_id_foreign');
		});
		Schema::table('cits_categors', function(Blueprint $table) {
			$table->dropForeign('cits_categors_category_id_foreign');
		});
	}
}