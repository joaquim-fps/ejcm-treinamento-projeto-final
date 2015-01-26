<?php
class ComentarioController extends BaseController {
    public function postCriar() {
        $inputs = Input::all();

        $validator = Validator::make($inputs, array(
            "texto" => "required",
            "noticia_id" => "required|exists:noticias,id"
        ));

        if($validator->passes()) {
            $comentario = Comentario::create($inputs);

            $comentario->usuario()->associate(Auth::user());
            $comentario->noticia()->associate(Noticia::where("id","=", $inputs['noticia_id'])->first());

            $comentario->save();

            return Redirect::back()->with("create_comentario_success", true);
        } else {
            return Redirect::back()->withErrors($validator->messages())->withInput();
        }
    }

    public function postEditar() {
        $inputs = Input::all();
        $comentario = Comentario::where("id", "=", $inputs['comentario_id'])->first();

        $validator = Validator::make($inputs, array(
            "texto_comentario" => "required",
            "comentario_id" => "required|exists:comentarios,id"
        ));

        if(Auth::user()->id == $comentario->usuario->id) {
            if($validator->passes()) {
                $comentario = Comentario::where("id", "=", $inputs['comentario_id'])->first();

                if (is_null($comentario))
                    return Response::make("Comentário não encontrado.", 404);

                $comentario->update(array(
                    "texto" => $inputs['texto_comentario']
                ));

                return Redirect::back()->with("update_comentario_success", true);
            } else {
                return Redirect::back()->withErrors($validator->messages())->withInput();
            }
        } else {
            return Redirect::back()->with("permission_error", true);
        }
    }

    public function getDeletar() {
        $id = Input::only("comentario_id");
        $comentario = Comentario::where("id", "=", $id)->first();

        if(!is_null($comentario) && Auth::user()->id == $comentario->usuario->id) {
            $comentario->delete();

            return Redirect::back()->with("delete_comentario_success", true);
        } else
            return Redirect::back()->with("permission_error", true);
    }
}

