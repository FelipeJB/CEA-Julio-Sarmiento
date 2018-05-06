<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datos extends Model
{
  protected $fillable = [
    'id', 'cargo', 'departamento', 'facultad', 'telefono', 'fax', 'compania', 'correo'
  ];
}
