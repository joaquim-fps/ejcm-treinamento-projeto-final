@extends("templates.main")

@section("titulo")
    {{$noticia->titulo}}
@stop

@section("conteudo")
    <h2>{{$noticia->titulo}}</h2>

    <p>{{$noticia->texto}}</p>
    
    <h3>Comentários</h3>

    @foreach($comentarios as $comentario)
        <div>
            <p>{{$comentario->texto}}</p>
            <form class="editar-form" action="{{URL::action("ComentarioController@postEditar")}}" method="POST">
                <div class="form-group input-texto">
                    <label class="control-label" for="texto">Texto:</label>
                    <input type="text" name="texto" id="texto" class="form-control"/>
                </div>

                <input name="comentario_id" id="comentario_id" type="hidden" value="{{$comentario->id}}"/>
                <div class="form-group">
                    <input class="btn btn-info" type="submit" value="Editar"/>
                </div>
            </form>

            <form class="deletar-form" action="{{URL::action("ComentarioController@getDeletar")}}">
                <input name="comentario_id" id="comentario_id" type="hidden" value="{{$comentario->id}}"/>
                <div class="form-group">
                    <input class="btn btn-danger" type="submit" value="Deletar"/>
                </div>
            </form>
        </div>
    @endforeach

    <h4>Criar comentário</h4>

    <form action="{{URL::action("ComentarioController@postCriar")}}" method="POST">
        <input name="noticia_id" id="noticia_id" type="hidden" value="{{$noticia->id}}"/>

        <div class="form-group col-sm-offset-1 col-sm-10">
            <label class="control-label" for="texto">Texto:</label>
            <textarea class="form-control" name="texto" id="texto" cols="30" rows="10">{{{Input::old("texto")}}}</textarea>
        </div>

        <div class="form-group col-sm-offset-1 col-sm-10">
            <input class="btn btn-success" type="submit" value="Comentar"/>
        </div>
    </form>
@stop

@section("js")
    {{HTML::script('js/editar-comentarios.js')}}
@stop