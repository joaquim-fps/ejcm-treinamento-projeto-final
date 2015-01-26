@extends("templates.main")

@section("titulo")
    {{$noticia->titulo}}
@stop

@section("css")
    {{HTML::style("css/visualizar-noticia.css")}}
@stop

@section("conteudo")
    <h2 xmlns="http://www.w3.org/1999/html">{{$noticia->titulo}}</h2>

    <div class="texto-noticia row">
        <img class="col-xs-12 col-sm-offset-3 col-sm-6" src="{{asset("uploads/capa-noticias/$noticia->foto_capa")}}" alt="foto noticia"/>
        <p class="col-sm-12">
            {{$noticia->texto}}
        </p>

        @if(!(is_null(Auth::user())) && Auth::user()->privilegios == 1)
            <div class="admin-inputs pull-right">
                <form class="editar-form" action="{{URL::action("NoticiaController@getEditar")}}" method="GET">
                    <input name="id" id="id" type="hidden" value="{{$noticia->id}}"/>
                        <input class="btn btn-info" type="submit" value="Editar"/>
                </form>

                <form class="deletar-form" action="{{URL::action("NoticiaController@getDeletar")}}">
                    <input name="id" id="noticia_id" type="hidden" value="{{$noticia->id}}"/>
                        <input class="btn btn-danger" type="submit" value="Deletar"/>
                </form>
            </div>
        @endif
    </div>

    @if(count($comentarios))
        <h3>Comentários</h3>

        @if ($errors->has("texto_comentario"))
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{$errors->first("texto_comentario")}}
            </div>
        @endif

        @foreach($comentarios as $comentario)
            <div class="comentario panel panel-default">
                <div class="panel-body">
                    <p>{{$comentario->texto}}</p>
                    <form class="editar-form" action="{{URL::action("ComentarioController@postEditar")}}" method="POST">
                        <div class="form-group">
                            <textarea class="form-control" name="texto_comentario" id="text" cols="30" rows="5"></textarea>
                        </div>
                        <input name="comentario_id" id="comentario_id" type="hidden" value="{{$comentario->id}}"/>

                        <input class="btn btn-success" type="submit" value="Alterar"/>
                    </form>
                </div>
                <div class="panel-footer clearfix">
                    <div class="pull-left">
                        <h6 class="pull-left" style="font-style: italic">By: {{{empty($noticia->usuario_id) ? "Anônimo" : $noticia->usuario->email}}} - {{{ $noticia->created_at === $noticia->updated_at ? "Criado em " . $noticia->created_at->format('D G:i') : "Editado em " . $noticia->updated_at->format('D G:i')}}}</h6>
                    </div>

                    @if(!(is_null(Auth::user())) && $comentario->usuario->id == Auth::user()->id)
                        <div class="pull-right">
                            <button type="button" class="btn btn-info edit_button"/>Editar</button>

                            <form class="deletar-form" action="{{URL::action("ComentarioController@getDeletar")}}">
                                <input name="comentario_id" id="comentario_id" type="hidden" value="{{$comentario->id}}"/>
                                    <input class="btn btn-danger" type="submit" value="Deletar"/>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach

        <div class="pagination">
            {{$comentarios->links()}}
        </div>
    @endif

    @if(!(is_null(Auth::user())))
        <div class="create-comentario clearfix">
            <h3>Criar comentário</h3>

            <form action="{{URL::action("ComentarioController@postCriar")}}" method="POST">
                <input name="noticia_id" id="noticia_id" type="hidden" value="{{$noticia->id}}"/>

                <div class="form-group col-sm-offset-1 col-sm-10">
                    @if($errors->has("texto"))
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{$errors->first("texto")}}
                        </div>
                    @endif

                    <label class="control-label" for="texto">Texto:</label>
                    <textarea class="form-control" name="texto" id="texto" cols="30" rows="10">{{{Input::old("texto")}}}</textarea>
                </div>

                <div class="form-group col-sm-offset-1 col-sm-10">
                    <input class="btn btn-success" type="submit" value="Comentar"/>
                </div>
            </form>
        </div>
    @else
        <div class="login-prompt">
            <p>Faça login para comentar.</p>
            <a href="{{URL::action("UsuarioController@getLogin")}}" class="btn btn-primary">Login</a>
        </div>
    @endif
@stop

@section("js")
    {{HTML::script('js/editar-comentarios.js')}}
@stop