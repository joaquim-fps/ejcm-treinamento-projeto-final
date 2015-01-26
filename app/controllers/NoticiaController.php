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
            "foto_capa" => "required|image|max:2000",
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
        $usuario = Auth::user();

        if($usuario->privilegios == 1) {
            $id = Input::only("id");
            $noticia = Noticia::where("id", "=", $id)->first();

            if (is_null($noticia))
                return Response::make("Notícia não encontrada", 404);

            return View::make('noticia.editar-noticia')->with("noticia", $noticia);
        } else
            return Redirect::back()->with("permission_error", true);
    }

    public function postEditar() {
        $inputs = Input::except("id", "foto_capa");
        $file = Input::file("foto_capa");

        $validator = Validator::make(array(
            "foto_capa" => $file,
            "titulo" => $inputs['titulo'],
            "texto" => $inputs['texto'],
            "genero" => $inputs['genero']
        ), array(
            "titulo" => "required",
            "texto" => "required",
            "foto_capa" => "image|max:2000",
            "genero" => "required"
        ));

        if ($validator->passes()) {
            $noticia = Noticia::where("id", "=", Input::only("id"))->first();

            if (is_null($noticia))
                return Response::make("Notícia não encontrada", 404);

            $noticia->update($inputs);

            if (!(is_null($file))) {
                $filename = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/capa-noticias", $filename);

                $noticia->foto_capa = $filename;
            }

            $noticia->save();

            return Redirect::back()->with("update_news_success", true);
        } else {
            return Redirect::back()->withErrors($validator->messages())->withInput();
        }
    }

    public function getDeletar() {
        $usuario = Auth::user();

        if($usuario->privilegios == 1) {
            $noticia = Noticia::where("id", "=", Input::only("id"))->first();

            if (is_null($noticia))
                return Response::make("Notícia não encontrada", 404);

            $noticia->delete();

            return Redirect::action("UsuarioController@getAdminPanel")->with("delete_news_success", true);
        } else
            return Redirect::back()->with("permission_error", true);
    }

    public function getListar() {
        $noticias = Noticia::orderBy("created_at", "desc")->paginate(10);

        return View::make("noticia.listar-noticias")->with(array(
            'noticias' => $noticias,
            'genero' => ""
        ));
    }

    public function getListarGenero($genero) {
        $noticias = Noticia::where("genero", "=", $genero)->orderBy("created_at", "desc")->paginate(10);

        return View::make("noticia.listar-noticias")->with(array(
            'noticias' => $noticias,
            'genero' => $genero
        ));
    }

    public function getVisualizar($id) {
        $noticia = Noticia::where("id", "=", $id)->first();

        if (is_null($noticia))
            return Response::make("Notícia não encontrada", 404);

        $comentarios = $noticia->comentarios()->orderBy("created_at", "desc")->paginate(10);

        return View::make("noticia.visualizar-noticia")->with(array(
            "noticia" => $noticia,
            "comentarios" => $comentarios
        ));
    }
}