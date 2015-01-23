<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsPrivilegiosOnUsuariosGeneroOnNoticias extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("usuarios", function(Blueprint $table) {
			$table->boolean("privilegios");
		});

		Schema::table("noticias", function(Blueprint $table) {
			$table->string("genero");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		SSchema::table("usuarios", function(Blueprint $table) {
			$table->dropColumn("privilegios");
		});

		Schema::table("noticias", function(Blueprint $table) {
			$table->dropColumn("genero");
		});
	}

}
