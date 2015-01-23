<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDestaqueOnNoticias extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("noticias", function(Blueprint $table) {
			$table->integer("destaque");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table("noticias", function(Blueprint $table) {
			$table->dropColumn("destaque");
		});
	}

}
