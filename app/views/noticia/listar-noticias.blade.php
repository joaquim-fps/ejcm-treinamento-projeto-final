@extends("templates.main")

@section("titulo")
    Notícias {{$genero}}
@stop

@section("css")
    {{HTML::style('css/listar-noticias.css')}}
@stop

@section("conteudo")
    <h2>Notícias  {{$genero}}</h2>

    @foreach($noticias as $noticia)
        <div class="row noticia">
            <a  href="{{URL::action('NoticiaController@getVisualizar', array('id' => $noticia->id))}}" id="imagem">
               <div class="col-md-12 blocos">
                    <div class="col-xs-4 col-sm-3">
                        <img id="imagem" src="{{asset('uploads/capa-noticias/' . $noticia->foto_capa)}}" alt="noticia destaque">
                    </div>

                    <div class="col-xs-8 col-sm-9">
                        <h3>{{$noticia->titulo}}</h3>
                        <p class="noticia-texto">{{$noticia->texto}}</p>
                    </div>
               </div>
            </a>
        </div>
    @endforeach

    <div class="pagination">
        {{$noticias->links()}}
    </div>
@stop

@section("js")
    {{HTML::script("js/text-trim.js")}}
@stop