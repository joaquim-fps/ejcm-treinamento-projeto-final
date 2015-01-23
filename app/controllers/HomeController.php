<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getHome() {
		$destaques = Noticia::where("destaque","=", "1")->orderBy("created_at", "desc")->take(4)->get();
		$noticias = Noticia::orderBy("created_at", "desc")->take(7)->get();
		$mundo = Noticia::where("genero","=", "mundo")->orderBy("created_at", "desc")->take(6)->get();
		$sport = Noticia::where("genero","=", "esportes")->orderBy("created_at", "desc")->take(6)->get();
		$tec = Noticia::where("genero","=", "tecnologia")->orderBy("created_at", "desc")->take(6)->get();
		$entretenimento = Noticia::where("genero","=", "entretenimento")->orderBy("created_at", "desc")->take(6)->get();

		return View::make('home')->with(array(
			"destaques" => $destaques,
			"noticias" => $noticias,
			"noticias_mundo" => $mundo,
			"noticias_esporte" => $sport,
			"noticias_tecnologia" => $tec,
			"noticias_entretenimento" => $entretenimento
		));
	}

}
