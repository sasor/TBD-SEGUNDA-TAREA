<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DependenciaAcademica extends Model
{
    protected $table = 'dependencia_academica';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['name'];
}
