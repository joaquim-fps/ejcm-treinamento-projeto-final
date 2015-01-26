@extends("templates.main")

@section("titulo")
    Home
@stop

@section("css")
    {{HTML::style("css/home.css")}}
@stop

@section("conteudo")
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
                        <img src="{{asset("uploads/capa-noticias/" . $destaques[$i]->foto_capa)}}" alt="noticia destaque">
                        <div class="carousel-caption">
                            <h4>{{$destaques[$i]->titulo}}</h4>
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
        <div class="col-sm-3 col-sm-offset-1">


            <ul>

                <table class="table">
                    <thead>
                    <tr>
                        <th>Últimas Notícias</th>
                    </tr>
                    </thead>
                    @foreach($noticias as $noticia)
                    <tbody>


                            <tr>
                                <td> <h4><a href="{{URL::action("NoticiaController@getVisualizar", array("id" => $noticia->id))}}">{{$noticia->titulo}}</a></h4></td>
                            </tr>

                        </tbody>
                    @endforeach
                    </table>

            </ul>

            <button type="button" class="btn btn-default"><a href="{{URL::action("NoticiaController@getListar")}}">Veja todas as notícias</a></button>

        </div>
    </div>

    <div id="mundo" class="row">
        <h2>Mundo</h2>

        <ul>
            @foreach($noticias_mundo as $noticia)
                <li>
                    <h4><a href="{{URL::action("NoticiaController@getVisualizar", array("id" => $noticia->id))}}">{{$noticia->titulo}}</a></h4>
                </li>
            @endforeach
        </ul>

        <a href="{{URL::action("NoticiaController@getListarGenero", array("genero" => "mundo"))}}">Veja todas as notícias do mundo</a>
    </div>

    <div id="esportes" class="row">
        <h2>Esportes</h2>

        <ul>
            <div class="row">
                @foreach($noticias_esporte as $noticia)
                    <div class="col-md-4">
                        <div>
                            <a href="{{URL::action('NoticiaController@getVisualizar', array('id' => $noticia->id))}}">
                                <img id="imagem" class="img_bottom" src="{{asset('uploads/capa-noticias/' . $noticia->foto_capa)}}" alt="noticia destaque">
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>
        </ul>

        <a href="{{URL::action("NoticiaController@getListarGenero", array("genero" => "esportes"))}}">Veja todas as notícias de esportes</a>
    </div>

    <div id="tecnologia" class="row">
        <h2>Tecnologia</h2>

        <ul>
            @foreach($noticias_tecnologia as $noticia)
                <li>
                    <h4><a href="{{URL::action("NoticiaController@getVisualizar", array("id" => $noticia->id))}}">{{$noticia->titulo}}</a></h4>
                </li>
            @endforeach
        </ul>

        <a href="{{URL::action("NoticiaController@getListarGenero", array("genero" => "tecnologia"))}}">Veja todas as notícias de tecnologia</a>
    </div>

    <div id="entretenimento" class="row">
        <h2>Entretenimento</h2>

        <ul>
            @foreach($noticias_entretenimento as $noticia)
                <li>
                    <h4><a href="{{URL::action("NoticiaController@getVisualizar", array("id" => $noticia->id))}}">{{$noticia->titulo}}</a></h4>
                </li>
            @endforeach
        </ul>

        <a href="{{URL::action("NoticiaController@getListarGenero", array("genero" => "entretenimento"))}}">Veja todas as notícias de entretenimento</a>
    </div>
@stop