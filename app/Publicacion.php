<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
  protected $fillable = [
    'id', 'nombre','descripcion','vinculo','seccion'
  ];
}
