<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Seccion;
use Auth;
use Redirect;

class SeccionController extends Controller
{

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      if (Auth::check()){
          if (Input::get('nombreS')!=null && Input::get('nombreS')!="" && Input::get('nombreS')!=" "){
                  $s = new Seccion();
                  $s->nombre = Input::get('nombreS');
                  $s->save();
                  return Redirect::to('/#Administrar')->with("nuevaS", "Se agreg&oacute la secci&oacuten");
          }
          return Redirect::to('/#Administrar')->with("errorS", "Por favor ingrese el nombre de la secci&oacuten");
      }
  }


}
