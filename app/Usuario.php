<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'usuario_id';
    public $timestamps = false;

    protected $fillable = ['username', 'password'];
    protected $hidden = ['password'];
}
