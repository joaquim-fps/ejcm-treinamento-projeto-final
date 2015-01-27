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
		//tabela usuarios
		Schema::create("usuarios", function(Blueprint $table) {
			$table->increments("id"); //PK
			$table->string("nome");
			$table->string("email")->unique();
			$table->string("senha");
			$table->string("foto");

			$table->timestamps();
			$table->rememberToken();
			$table->softDeletes();
		});

		//tabela noticias
		Schema::create("noticias", function(Blueprint $table) {
			$table->increments("id"); //PK
			$table->integer("usuario_id")->unsigned()->nullable(); //FK
			$table->string("titulo");
			$table->text("texto");
			$table->string("foto_capa");

			$table->timestamps();
			$table->softDeletes();

			$table->foreign("usuario_id")->references("id")->on("usuarios")->onDelete("set null"); //FK
		});

		//tabela comentarios
		Schema::create("comentarios", function(Blueprint $table) {
			$table->increments("id"); //PK
			$table->integer("usuario_id")->unsigned()->nullable(); //FK
			$table->integer("noticia_id")->unsigned()->nullable(); //FK
			$table->text("texto");

			$table->timestamps();
			$table->softDeletes();

			$table->foreign("usuario_id")->references("id")->on("usuarios")->onDelete("set null"); //FK
			$table->foreign("noticia_id")->references("id")->on("noticias")->onDelete("cascade"); //FK
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("comentarios");
		Schema::drop("noticias");
		Schema::drop("usuarios");
	}

}
