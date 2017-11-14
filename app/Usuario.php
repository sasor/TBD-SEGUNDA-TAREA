<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['username', 'password'];
    protected $hidden = ['password'];

    public function roles()
    {
        return $this->belongsToMany('App\Rol');
    }

    public function proyectos()
    {
        return $this->belongsToMany('App\Proyecto');
    }
}
