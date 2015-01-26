@extends("templates.main")

@section("titulo")
    Notícias {{$genero}}
@stop

@section("css")
    {{HTML::style('css/listar-noticias.css')}}
@stop

@section("conteudo")
    <h2>Notícias  {{$genero}} </h2>

    <div class="row">
        @foreach($noticias as $noticia)
               <div class="col-md-6 blocos">
                    <div>
                        <a href="{{URL::action('NoticiaController@getVisualizar', array('id' => $noticia->id))}}">
                            <img id="imagem" src="{{asset('uploads/capa-noticias/' . $noticia->foto_capa)}}" alt="noticia destaque">
                        </a>
                    </div>
                    <div>
                    <a  href="{{URL::action('NoticiaController@getVisualizar', array('id' => $noticia->id))}}" id="imagem">
                        <h3>{{$noticia->titulo}}</h3>
                    </a>
                        <p>{{$noticia->texto}}</p>
                    </div>
               </div>
        @endforeach
    </div>

    <div class="pagination">
        {{$noticias->links()}}
    </div>
@stop