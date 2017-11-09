<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcion extends Model
{
    protected $table = 'funcion';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['name'];
}
