@extends("templates.main")

@section("titulo")
    Notícias {{$genero}}
@stop

@section("conteudo")
    <h2>Notícias  {{$genero}} </h2>

    @foreach($noticias as $noticia)
        <a href="{{URL::action('NoticiaController@getVisualizar', array("id" => $noticia->id))}}">
            <h3>{{$noticia->titulo}}</h3>

            <p>{{$noticia->texto}}</p>
        </a>
    @endforeach

    <div class="pagination">
        {{$noticias->links()}}
    </div>
@stop