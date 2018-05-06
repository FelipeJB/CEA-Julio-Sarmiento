<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Datos;
use Auth;
use Redirect;

class DatosController extends Controller
{

  /**
   * Show the form for editing a resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function edit()
  {
      if (Auth::check()){

                  $datos= \App\Datos::all()[0];

                  if(Input::get('selCampo')=="Cargo"){
                    $datos->cargo=Input::get('nombreValor');
                    $datos->save();
                    return Redirect::to('/')->with("nuevaDatos", "Se actualizó el cargo");
                  }
                  if(Input::get('selCampo')=="Departamento"){
                    $datos->departamento=Input::get('nombreValor');
                    $datos->save();
                    return Redirect::to('/')->with("nuevaDatos", "Se actualizó el departamento");
                  }
                  if(Input::get('selCampo')=="Facultad"){
                    $datos->facultad=Input::get('nombreValor');
                    $datos->save();
                    return Redirect::to('/')->with("nuevaDatos", "Se actualizó la facultad");
                  }
                  if(Input::get('selCampo')=="Telefono"){
                    $datos->telefono=Input::get('nombreValor');
                    $datos->save();
                    return Redirect::to('/')->with("nuevaDatos", "Se actualizó el teléfono");
                  }
                  if(Input::get('selCampo')=="Fax"){
                    $datos->fax=Input::get('nombreValor');
                    $datos->save();
                    return Redirect::to('/')->with("nuevaDatos", "Se actualizó el fax");
                  }
                  if(Input::get('selCampo')=="Compania"){
                    $datos->compania=Input::get('nombreValor');
                    $datos->save();
                    return Redirect::to('/')->with("nuevaDatos", "Se actualizó la compañía");
                  }
                  if(Input::get('selCampo')=="Correo"){
                    $datos->correo=Input::get('nombreValor');
                    $datos->save();
                    return Redirect::to('/')->with("nuevaDatos", "Se actualizó el correo");
                  }

                  return Redirect::to('/')->with("errorDatos", "Error en la actualización de datos");
      }
  }


}
