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
		$destaques = Noticia::where("destaque","=", "1")->orderBy("created_at", "desc")->get();
		$noticias = Noticia::orderBy("created_at", "desc")->get();


		return View::make('home')->with(array(
			"destaques" => $destaques,
			"noticias" => $noticias
		));
	}

}
