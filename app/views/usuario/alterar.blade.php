@extends("templates.main")

@section("titulo")
    Perfil
@stop

@section("css")
    {{HTML::style('css/alterar.css')}}
@stop

@section("conteudo")
    <h2>Perfil</h2>

    <form class="form clearfix" action="{{URL::action("UsuarioController@postAlterar")}}" method="POST" enctype="multipart/form-data">

        <div class="form-group col-sm-offset-1 col-sm-10">
            @if ($errors->has("foto"))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$errors->first("foto")}}
                </div>
            @endif

            <div class="row">
                <label class="control-label col-sm-4" for="foto">
                    <figure id="foto-preview">
                        <img id="preview" src="{{asset(empty($usuario->foto) ? "img/blank-foto-usuario.jpg" : "uploads/foto-usuarios/$usuario->foto")}}" alt="Foto usuario"/>
                    </figure>
                </label>
            </div>

            <label class="control-label btn btn-info" for="foto">Upload Foto</label>
            <input type="file" name="foto" id="foto" class="form-control" onchange="readURL(this);"/>
        </div>


        <div class="form-group col-sm-offset-1 col-sm-10">
            @if ($errors->has("nome"))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$errors->first("nome")}}
                </div>
            @endif

            <label class="control-label" for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{{Input::old("nome", $usuario->nome)}}}"/>
        </div>

        <div class="form-group col-sm-offset-1 col-sm-10">
            @if ($errors->has("email"))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$errors->first("email")}}
                </div>
            @endif

            <label class="control-label" for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{{Input::old("email", $usuario->email)}}}"/>
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

        <div class="form-group col-sm-offset-1 col-sm-10 buttons">
            <input class="btn btn-success" type="submit" value="Alterar"/>
            <a class="pull-right btn btn-danger" href="{{URL::action("UsuarioController@getDeletar")}}">Deletar usuário</a>
        </div>
    </form>
@stop

@section("js")
    {{HTML::script('js/foto-preview.js')}}
@stop