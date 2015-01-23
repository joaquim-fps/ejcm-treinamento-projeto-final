@extends("templates.main")

@section("titulo")
    Criar Notícia
@stop

@section("css")
    {{HTML::style('css/criar-noticia.css')}}
@stop

@section("conteudo")
    <h2>Criar notícia</h2>

    @if (Session::has("create_news_success"))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Notícia criada com sucesso.
        </div>
    @endif

    <form class="form clearfix" action="{{URL::action("NoticiaController@postCriar")}}" method="POST" enctype="multipart/form-data">
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
                        <img id="preview" src="{{asset("img/blank-foto-noticia.jpg")}}" alt="Foto de capa da notícia"/>
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
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{{Input::old("titulo")}}}"/>
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
                <option value="mundo">Mundo</option>
                <option value="esportes">Esportes</option>
                <option value="tecnologia">Tecnologia</option>
                <option value="entretenimento">Entretenimento</option>
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
            <textarea class="form-control" name="texto" id="texto" cols="30" rows="20">{{{Input::old("texto")}}}</textarea>
        </div>

        <div class="form-group col-sm-10 col-sm-offset-1">
            <label class="control-label" for="destaque">
                <input type="checkbox" name="destaque" id="destaque" value="1"/> Destaque
            </label>
        </div>

        <div class="form-group col-sm-10 col-sm-offset-1 buttons">
            <input class="btn btn-success" type="submit" value="Criar"/>
        </div>
    </form>
@stop

@section("js")
    {{HTML::script('js/foto-preview.js')}}
@stop