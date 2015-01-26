<?php
class UsuarioController extends BaseController {
    public function getLogin(){
        return View::make("usuario.login");
    }

    public function postLogin(){
        $inputs = Input::all();

        $validator = Validator::make($inputs, array(
            "email" => "required|email",
            "senha" => "required"
        ));

        $credentials = array(
            "email" => $inputs['email'],
            "password" => $inputs['senha']
        );

        if($validator->passes()) {
            if(Auth::attempt($credentials)) {
                if (Auth::user()->privilegios == 1) {
                    return Redirect::intended("admin-panel");
                } else {
                    return Redirect::intended("home")->with("login_success", true);
                }
            } else {
                return Redirect::back()->withInput()->withErrors(array(
                    "attempt" => "Um usuário com essas credenciais não foi encontrado."
                ));
            }
        } else {
            return Redirect::back()->withErrors($validator->messages())->withInput();
        }
    }

    public function getLogout() {
        Auth::logout();

        return Redirect::action('HomeController@getHome')->with("logout_success", true);
    }

    public function getCadastrar() {
        return View::make('usuario.cadastrar');
    }

    public function postCadastrar() {
        $inputs = Input::all();

        $validator = Validator::make($inputs, array(
            "email" => "required|email|unique:usuarios,email",
            "senha" => "required|confirmed",
            "nome" => "required"
        ));

        if($validator->passes()) {
            $usuario = Usuario::create($inputs);

            $usuario->senha = Hash::make($inputs["senha"]);
            $usuario->privilegios = 0;

            $usuario->save();

            return Redirect::action('UsuarioController@getLogin')->with('cadastro_success', true);
        } else {
            return Redirect::back()->withErrors($validator->messages())->withInput();
        }
    }

    public function getAlterar() {
        return View::make("usuario.alterar")->with("usuario", Auth::user());
    }

    public function postAlterar() {
        $inputs = Input::all();
        $file = Input::file("foto");
        $usuario = Auth::user();

        $validator = Validator::make(array(
            "foto" => $file,
            "email" => $inputs['email'],
            "nome" => $inputs['nome'],
            "senha" => $inputs['senha'],
            "senha_confirmation" => $inputs['senha_confirmation']
        ), array(
            "email" => "required|email|unique:usuarios,email,$usuario->id",
            "nome" => "required",
            "senha" => "confirmed",
            "foto" => "image|max:2000"
        ));

        if ($validator->passes()) {
            $usuario->update(array(
                "email" => $inputs['email'],
                "nome" => $inputs['nome']
            ));

            if (!(is_null($file))) {
                $filename = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/foto-usuarios", $filename);

                $usuario->foto = $filename;
                $usuario->save();
            }

            if (!empty($inputs["senha"])) {
                $usuario->senha = Hash::make($inputs["senha"]);
                $usuario->save();
            }

            return Redirect::back()->with('alterar_success', true);
        } else {
            return Redirect::back()->withErrors($validator->messages())->withInput();
        }
    }

    public function getDeletar(){
        $usuario = Auth::user();

        Auth::logout();

        $usuario->delete();

        return Redirect::action('HomeController@getHome')->with("delete_usuario_success", true);
    }

    public function getAdminPanel(){
        if(Auth::user()->privilegios == 1)
            return View::make("admin.admin-panel")->with("admin", Auth::user());
        else
            return Redirect::back()->with("permission_error", true);
    }

    public function getAdminCadastro(){
        if(is_null(Auth::user()))
            return View::make("admin.admin-cadastro");
        else
            return Redirect::back();
    }

    public function postAdminCadastro(){
        $inputs = Input::all();

        $validator = Validator::make($inputs, array(
            "email" => "required|email|unique:usuarios,email",
            "senha" => "required|confirmed",
            "nome" => "required",
            "pass_empresa" => "required"
        ));

        if($validator->passes() && $inputs["pass_empresa"] == "123456") {
            $usuario = Usuario::create(array(
                "nome" => $inputs['nome'],
                "email" => $inputs['email']
            ));

            $usuario->senha = Hash::make($inputs["senha"]);
            $usuario->privilegios = 1;

            $usuario->save();

            return Redirect::action('UsuarioController@getLogin')->with('cadastro_success', true);
        } else {
            return Redirect::back()->withErrors($validator->messages())->withInput();
        }
    }
}