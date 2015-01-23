<?php
class NoticiaController extends BaseController {
    public function getCriar() {
        $usuario = Auth::user();

        if($usuario->privilegios == 1)
            return View::make('noticia.criar-noticia')->with("admin", $usuario);
        else
            return Redirect::back()->with("permission_error", true);
    }

    public function postCriar() {
        $inputs = Input::all();
        $file = Input::file("foto_capa");

        $validator = Validator::make(array(
            "foto_capa" => $file,
            "titulo" => $inputs['titulo'],
            "texto" => $inputs['texto'],
            "genero" => $inputs['genero']
        ), array(
            "titulo" => "required",
            "texto" => "required",
            "foto_capa" => "required|image",
            "genero" => "required"
        ));

        if ($validator->passes()) {
            $noticia = Noticia::create($inputs);
            $noticia->usuario()->associate(Auth::user());

            if (!(is_null($file))) {
                $filename = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/capa-noticias", $filename);

                $noticia->foto_capa = $filename;
            }

            $noticia->save();

            return Redirect::back()->with("create_news_success", true);
        } else {
            return Redirect::back()->withErrors($validator->messages())->withInput();
        }
    }

    public function getEditar() {

    }

    public function postEditar() {

    }

    public function getDeletar() {

    }

    public function getListar($genero) {

    }
}