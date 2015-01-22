<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesUsuariosNoticiasComentarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("usuarios", function(Blueprint $table) {
			$table->increments("id");
			$table->string("nome");
			$table->string("email")->unique();
			$table->string("senha");
			$table->string("foto");

			$table->timestamps();
			$table->rememberToken();
			$table->softDeletes();
		});

		Schema::create("noticias", function(Blueprint $table) {
			$table->increments("id");
			$table->integer("usuario_id")->unsigned()->nullable();
			$table->string("titulo");
			$table->text("texto");
			$table->string("foto-capa");

			$table->timestamps();
			$table->softDeletes();

			$table->foreign("usuario_id")->references("id")->on("usuarios")->onDelete("set null");
		});

		Schema::create("comentarios", function(Blueprint $table) {
			$table->increments("id");
			$table->integer("usuario_id")->unsigned()->nullable();
			$table->integer("noticia_id")->unsigned()->nullable();
			$table->text("texto");

			$table->timestamps();
			$table->softDeletes();

			$table->foreign("usuario_id")->references("id")->on("usuarios")->onDelete("set null");
			$table->foreign("noticia_id")->references("id")->on("noticias")->onDelete("cascade");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("usuarios");
		Schema::drop("noticias");
		Schema::drop("comentarios");
	}

}
