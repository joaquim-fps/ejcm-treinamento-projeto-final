<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Noticia extends Eloquent {
    use SoftDeletingTrait; //usar softDeletingTrait no Laravel 4.2

    protected $table = "noticias";

    protected $softDelete = true;

    protected $guarded = array("id", "usuario_id", "created_at", "updated_at", "deleted_at");

    //noticia pertence a 1 usuario
    public function usuario(){
        return $this->belongsTo("Usuario", "usuario_id", "id");
    }

    //noticia tem N comentarios
    public function comentarios(){
        return $this->hasMany("Comentario", "noticia_id", "id");
    }
}