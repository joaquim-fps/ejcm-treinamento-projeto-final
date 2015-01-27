<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Comentario extends Eloquent {
    use SoftDeletingTrait; //usar softDeletingTrait no Laravel 4.2

    protected $table = "comentarios";

    protected $softDelete = true;

    protected $guarded = array("id", "usuario_id", "noticia_id", "created_at", "updated_at", "deleted_at");

    //comentario pertence a 1 usuario
    public function usuario(){
        return $this->belongsTo("Usuario", "usuario_id", "id");
    }

    //comentario pertence a 1 noticia
    public function noticia(){
        return $this->belongsTo("Noticia", "noticia_id", "id");
    }
}