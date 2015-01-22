<?php
class Noticia extends Eloquent {
    protected $table = "noticias";

    protected $softDelete = true;

    protected $guarded = array("id", "usuario_id", "created_at", "updated_at", "deleted_at");

    public function usuario(){
        return $this->belongsTo("Usuario", "usuario_id", "id");
    }

    public function comentarios(){
        return $this->hasMany("Comentario", "noticia_id", "id");
    }
}