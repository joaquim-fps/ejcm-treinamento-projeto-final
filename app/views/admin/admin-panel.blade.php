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
            <li><a href="#" class="btn btn-primary btn-block">Criar notíca</a></li>
            <li><a href="#" class="btn btn-warning btn-block">Editar notíca</a></li>
            <li><a href="#" class="btn btn-danger btn-block">Deletar notícia</a></li>
        </ul>
    </div>

@stop