@extends("templates.main")

@section("titulo")
    Home
@stop

@section("css")
    {{HTML::style("css/home.css")}}
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
@stop

@section("conteudo")
    <h1><a href="{{URL::action("HomeController@getHome")}}">Não <span id="white">Q</span>uero <span id="orange">O</span>pinar <sub>notícias imparciais</sub></a></h1>

    <div class="row">
        <!-- carousel -->
            <div id="carousel-noticias" class="carousel slide col-sm-8" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-noticias" data-slide-to="0" class="active"></li>
                @for($i = 1; $i < count($destaques); $i++)
                    <li data-target="#carousel-noticias" data-slide-to="{{$i}}"></li>
                @endfor
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @for($i = 0; $i < count($destaques); $i++)
                    <div class="item @if($i == 0) active @endif">
                        <a href="{{URL::action("NoticiaController@getVisualizar", array("id" => $destaques[$i]->id))}}">
                            <img id="capa-foto" class="{{$destaques[$i]->genero}}" src="{{asset("uploads/capa-noticias/" . $destaques[$i]->foto_capa)}}" alt="noticia destaque">
                        </a>
                        <div class="carousel-caption">
                            <a class="carousel-link" href="{{URL::action("NoticiaController@getVisualizar", array("id" => $destaques[$i]->id))}}"><h4>{{$destaques[$i]->titulo}}</h4></a>
                        </div>
                    </div>
                @endfor
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
        <div class="col-sm-4 ultimas">
            <h3>Últimas Notícias</h3>
            <ul>
                @foreach($noticias as $noticia)
                    <li>
                        <a href="{{URL::action("NoticiaController@getVisualizar", array("id" => $noticia->id))}}">
                            <h4>
                                {{$noticia->titulo}}
                            </h4>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- seção de noticias mundo -->
    <div id="mundo" class="row">
        <h2>Mundo</h2>

        @foreach($noticias_mundo as $noticia)
            <div class="col-xs-12 col-sm-6 col-md-3 noticia">
                <a href="{{URL::action('NoticiaController@getVisualizar', array('id' => $noticia->id))}}" id="imagem">
                    <div class="blocos">
                        <div>
                            <img src="{{asset('uploads/capa-noticias/' . $noticia->foto_capa)}}" alt="noticia destaque">
                        </div>

                        <div>
                            <h3 class="noticia-header">{{$noticia->titulo}}</h3>
                            <p class="noticia-texto">{{$noticia->texto}}</p>
                        </div>
                    </div>

                    <a class="btn btn-warning" href="{{URL::action('NoticiaController@getVisualizar', array('id' => $noticia->id))}}">Leia mais</a>
                </a>
            </div>
        @endforeach
    </div>

    <!-- seção de noticias esporte -->
    <div id="esportes" class="row">
        <h2>Esportes</h2>

        @foreach($noticias_esporte as $noticia)
            <div class="col-xs-12 col-sm-6 col-md-3 noticia">
                <a href="{{URL::action('NoticiaController@getVisualizar', array('id' => $noticia->id))}}" id="imagem">
                    <div class="blocos">
                        <div>
                            <img src="{{asset('uploads/capa-noticias/' . $noticia->foto_capa)}}" alt="noticia destaque">
                        </div>

                        <div>
                            <h3 class="noticia-header">{{$noticia->titulo}}</h3>
                            <p class="noticia-texto">{{$noticia->texto}}</p>
                        </div>
                    </div>

                    <a class="btn btn-primary" href="{{URL::action('NoticiaController@getVisualizar', array('id' => $noticia->id))}}">Leia mais</a>
                </a>
            </div>
        @endforeach
    </div>

    <!-- seção de noticias tecnologia -->
    <div id="tecnologia" class="row">
        <h2>Tecnologia</h2>

        @foreach($noticias_tecnologia as $noticia)
            <div class="col-xs-12 col-sm-6 col-md-3 noticia">
                <a href="{{URL::action('NoticiaController@getVisualizar', array('id' => $noticia->id))}}" id="imagem">
                    <div class="blocos">
                        <div>
                            <img src="{{asset('uploads/capa-noticias/' . $noticia->foto_capa)}}" alt="noticia destaque">
                        </div>

                        <div>
                            <h3 class="noticia-header">{{$noticia->titulo}}</h3>
                            <p class="noticia-texto">{{$noticia->texto}}</p>
                        </div>
                    </div>

                    <a class="btn btn-warning" href="{{URL::action('NoticiaController@getVisualizar', array('id' => $noticia->id))}}">Leia mais</a>
                </a>
            </div>
        @endforeach
    </div>

    <!-- seção de noticias entretenimento -->
    <div id="entretenimento" class="row">
        <h2>Entretenimento</h2>

        @foreach($noticias_entretenimento as $noticia)
            <div class="col-xs-12 col-sm-6 col-md-3 noticia">
                <a href="{{URL::action('NoticiaController@getVisualizar', array('id' => $noticia->id))}}" id="imagem">
                    <div class="blocos">
                        <div>
                            <img src="{{asset('uploads/capa-noticias/' . $noticia->foto_capa)}}" alt="noticia destaque">
                        </div>

                        <div>
                            <h3 class="noticia-header">{{$noticia->titulo}}</h3>
                            <p class="noticia-texto">{{$noticia->texto}}</p>
                        </div>
                    </div>

                    <a class="btn btn-primary" href="{{URL::action('NoticiaController@getVisualizar', array('id' => $noticia->id))}}">Leia mais</a>
                </a>
            </div>
        @endforeach
    </div>
@stop

@section("js")
    {{HTML::script("js/text-trim.js")}}
@stop