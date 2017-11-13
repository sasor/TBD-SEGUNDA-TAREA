<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
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
