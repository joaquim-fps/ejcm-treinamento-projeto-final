<?php
class Comentario extends Eloquent {
    protected $table = "comentarios";

    protected $softDelete = true;

    protected $guarded = array("id", "usuario_id", "noticia_id", "created_at", "updated_at", "deleted_at");

    public function usuario(){
        return $this->belongsTo("Usuario", "usuario_id", "id");
    }

    public function comentarios(){
        return $this->belongsTo("Noticia", "noticia_id", "id");
    }
}