<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Descripcion;
use Auth;
use Redirect;

class DescripcionController extends Controller
{

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      if (Auth::check()){
          if (Input::get('descD')!=null){
                  Descripcion::truncate();
                  $d = new Descripcion();
                  $d->descripcion = Input::get('descD');
                  $d->save();
                  return Redirect::to('/')->with("nuevaD", "Se agreg&oacute la descripci&oacuten");
          }
          return Redirect::to('/')->with("errorD", "Por favor ingrese una descripción");
      }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @return \Illuminate\Http\Response
   */
  public function delete()
  {
      if (Auth::check()) {
              Descripcion::truncate();
              return Redirect::to('/')->with("nuevaD", "Se elimin&oacute la descripci&oacuten");

      }
  }

  /**
   * Show the form for editing a resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function edit()
  {
      if (Auth::check()){
          if (Input::get('descD')!=null){
                  Descripcion::truncate();
                  $d = new Descripcion();
                  $d->descripcion = Input::get('descD');
                  $d->save();
                  return Redirect::to('/')->with("nuevaD", "Se actualiz&oacute la descripci&oacuten");
          }
          return Redirect::to('/')->with("errorD", "Por favor ingrese una descripción");
      }
  }

}
