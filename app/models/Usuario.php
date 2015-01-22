<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usuario extends Eloquent implements UserInterface, RemindableInterface {
    use UserTrait, RemindableTrait;

    protected $table = "usuarios";

    protected $softDelete = true;

    protected $guarded = array("id", "senha", "senha_confirmation", "remember_token", "created_at", "updated_at", "deleted_at");

    public function getAuthPassword() {
        return $this->senha;
    }

    public function noticias() {
        return $this->hasMany("Noticia", "usuario_id", "id");
    }

    public function comentarios() {
        return $this->hasMany("Comentario", "usuario_id", "id");
    }
}