@extends("templates.main")

@section("titulo")
    Home
@stop

@section("conteudo")
    <!-- carousel -->
    <div id="carousel-noticias" class="carousel slide col-sm-8" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-noticias" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-noticias" data-slide-to="1"></li>
            <li data-target="#carousel-noticias" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            {{--@foreach($destaques as $destaque)--}}
                {{--<div class="item">--}}
                    {{--<img src="{{asset("img/$noticia->foto_capa")}}" alt="">--}}
                    {{--<div class="carousel-caption">--}}
                        {{--<h5>{{$noticia->titulo}}</h5>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endforeach--}}
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-noticias" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-noticias" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- ultimas noticias -->
    <div class="col-sm-3 col-sm-offset-1">
        <h3>Últimas Notícias</h3>
        <ul>
            {{--@foreach($noticias as $noticia)--}}
               {{--<li>--}}
                   {{----}}
               {{--</li> --}}
            {{--@endforeach--}}
        </ul>
    </div>
@stop