@extends("templates.main")

@section("titulo")
    Admin Panel
@stop

@section("css")
    {{HTML::style('css/admin-panel.css')}}
@stop

@section("conteudo")
    <div class="jumbotron">
        <h2>Bem vindo, {{{$admin->nome}}}!</h2>
        <h3>O que deseja fazer?</h3>

        <ul>
            <li><a href="{{URL::action("NoticiaController@getCriar")}}" class="btn btn-primary btn-block">Criar notícia</a></li>
            <li>
                <form class="form-inline" action="{{URL::action("NoticiaController@getEditar")}}" method="GET">
                    <input type="submit" class="btn btn-warning btn-block" value="Editar notícia">

                    <div class="form-group col-sm-offset-3 col-md-offset-4 col-xs-12 col-sm-8">
                        <label class="control-label" for="id">ID da notícia:</label>
                        <input name="id" id="id" class="form-control" type="text" value="0"/>
                    </div>
                </form>
            </li>
            <li>
                <form class="form-inline" action="{{URL::action("NoticiaController@getDeletar")}}" method="GET">
                    <input type="submit" class="btn btn-danger btn-block" value="Deletar notícia">

                    <div class="form-group col-sm-offset-3 col-md-offset-4 col-xs-12 col-sm-8">
                        <label class="control-label" for="id">ID da notícia:</label>
                        <input name="id" id="id" class="form-control" type="text" value="0"/>
                    </div>
                </form>
            </li>
        </ul>
    </div>
@stop

@section("js")
    {{HTML::script('js/choose-id.js')}}
@stop