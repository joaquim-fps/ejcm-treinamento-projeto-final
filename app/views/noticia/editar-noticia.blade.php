@extends("templates.main")

@section("titulo")
    Editar notícia
@stop

@section("css")
    {{HTML::style('css/editar-noticia.css')}}
@stop

@section("conteudo")
    <h2>Editar notícia</h2>

    <form class="form clearfix" action="{{URL::action("NoticiaController@postEditar")}}" method="POST" enctype="multipart/form-data">
        <div class="form-group col-sm-offset-1 col-sm-10">
            @if ($errors->has("foto_capa"))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$errors->first("foto_capa")}}
                </div>
            @endif

            <div class="row">
                <label class="control-label col-sm-12" for="foto_capa">
                    <figure id="foto-preview">
                        <img id="preview" src="{{empty($noticia->foto_capa) ? asset("img/blank-foto-noticia.jpg") : asset("uploads/capa-noticias/$noticia->foto_capa")}}" alt="Foto de capa da notícia"/>
                    </figure>
                </label>
            </div>

            <label class="control-label btn btn-info" for="foto_capa">Upload Foto</label>
            <input type="file" name="foto_capa" id="foto_capa" class="form-control" onchange="readURL(this);"/>
        </div>

        <div class="form-group col-sm-10 col-sm-offset-1">
            @if ($errors->has("titulo"))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$errors->first("titulo")}}
                </div>
            @endif

            <label class="control-label" for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{{Input::old("titulo", $noticia->titulo)}}}"/>
        </div>

        <div class="form-group col-sm-10 col-sm-offset-1">
            @if ($errors->has("genero"))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$errors->first("genero")}}
                </div>
            @endif

            <label for="genero">Gênero:</label>
            <select class="form-control" name="genero" id="genero">
                <option value="mundo" @if(Input::old("genero", $noticia->genero) == "mundo") selected @endif>Mundo</option>
                <option value="esportes" @if(Input::old("genero", $noticia->genero) == "esportes") selected @endif>Esportes</option>
                <option value="tecnologia" @if(Input::old("genero", $noticia->genero) == "tecnologia") selected @endif>Tecnologia</option>
                <option value="entretenimento" @if(Input::old("genero", $noticia->genero) == "entretenimento") selected @endif>Entretenimento</option>
            </select>
        </div>

        <div class="form-group col-sm-10 col-sm-offset-1">
            @if ($errors->has("texto"))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$errors->first("texto")}}
                </div>
            @endif
            <label class="control-label" for="texto">Texto:</label>
            <textarea class="form-control" name="texto" id="texto" cols="30" rows="20">{{{Input::old("texto", $noticia->texto)}}}</textarea>
        </div>

        <div class="form-group col-sm-10 col-sm-offset-1">
            <label class="control-label" for="destaque">
                <input type="checkbox" name="destaque" id="destaque" value="1" @if(Input::old("destaque", $noticia->destaque)) checked @endif/> Destaque
            </label>
        </div>

        <div class="form-group col-sm-10 col-sm-offset-1 buttons">
            <input name="id" type="hidden" value="{{$noticia->id}}"/>
            <input class="btn btn-success" type="submit" value="Editar"/>
        </div>
    </form>
@stop

@section("js")
    {{HTML::script('js/foto-preview.js')}}
@stop