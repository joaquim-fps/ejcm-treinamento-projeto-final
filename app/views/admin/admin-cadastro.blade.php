@extends("templates.main")

@section("titulo")
    Cadastro Admin
@stop

@section("css")
    {{HTML::style('css/admin-cadastro.css')}}
@stop

@section("conteudo")
    <h2>Cadastro admin</h2>

    <form class="form clearfix" action="{{URL::action("UsuarioController@postAdminCadastro")}}" method="POST">
        <div class="form-group col-sm-offset-1 col-sm-10">
            @if ($errors->has("nome"))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$errors->first("nome")}}
                </div>
            @endif

            <label class="control-label" for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{{Input::old("nome")}}}"/>
        </div>

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
            <input type="password" name="senha" id="senha" class="form-control"/>
        </div>

        <div class="form-group col-sm-offset-1 col-sm-10 ">
            <label class="control-label" for="senha_confirmation">Confirmar senha:</label>
            <input type="password" name="senha_confirmation" id="senha_confirmation" class="form-control"/>
        </div>

        <div class="form-group col-sm-offset-1 col-sm-10">
            @if ($errors->has("senha_empresa"))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$errors->first("senha_empresa")}}
                </div>
            @endif

            <label class="control-label" for="pass_empresa">Senha da empresa:</label>
            <input type="password" name="pass_empresa" id="pass_empresa" class="form-control"/>
        </div>

        <div class="form-group col-sm-offset-1 col-sm-10 buttons">
            <input class="btn btn-success" type="submit" value="Cadastrar"/>
        </div>
    </form>
@stop