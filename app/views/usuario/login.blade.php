@extends("templates.main")

@section("titulo")
    Login
@stop

@section("css")
    {{HTML::style('css/login.css')}}
@stop

@section("conteudo")
    <h2>Login</h2>

    @if ($errors->has("attempt"))
        <div class="alert alert-danger alert-dismissible fade in col-sm-offset-1 col-sm-10" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{$errors->first("attempt")}}
        </div>
    @endif
    <form class="form clearfix" action="{{URL::action("UsuarioController@postLogin")}}" method="POST">
        <div class="form-group col-sm-offset-1 col-sm-10">
            @if ($errors->has("email"))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$errors->first("email")}}
                </div>
            @endif

            <label class="control-label" for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{{Input::old("email")}}}"/>
        </div>

        <div class="form-group col-sm-offset-1 col-sm-10">
            @if ($errors->has("senha"))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$errors->first("senha")}}
                </div>
            @endif

            <label class="control-label" for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control" value="{{{Input::old("senha")}}}"/>
        </div>

        <div class="form-group col-sm-offset-1 col-sm-10 buttons">
            <input class="btn btn-success" type="submit" value="Login"/>
            <a href="{{URL::action("UsuarioController@getCadastrar")}}" class="btn btn-info">Cadastrar</a>
        </div>
    </form>
@stop