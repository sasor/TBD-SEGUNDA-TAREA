<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectoStatus extends Model
{
    protected $table = 'proyecto_status';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['name'];
}
