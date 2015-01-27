<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Usuario extends Eloquent implements UserInterface, RemindableInterface {
    use UserTrait, RemindableTrait, SoftDeletingTrait; //usar softDeletingTrait no Laravel 4.2

    protected $table = "usuarios";

    protected $softDelete = true;

    protected $guarded = array("id", "senha", "senha_confirmation", "remember_token", "created_at", "updated_at", "deleted_at");

    //fix
    public function getAuthPassword() {
        return $this->senha;
    }

    //usuario tem N noticias
    public function noticias() {
        return $this->hasMany("Noticia", "usuario_id", "id");
    }

    //usuario tem N comentarios
    public function comentarios() {
        return $this->hasMany("Comentario", "usuario_id", "id");
    }
}