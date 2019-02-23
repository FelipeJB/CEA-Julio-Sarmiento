<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Publicacion;
use App\Seccion;
use App\Orden;
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
    try {
      if (Auth::check()){
          if (Input::get('nombreS')!=null && Input::get('nombreS')!="" && Input::get('nombreS')!=" "){
                  $s = new Seccion();
                  $s->nombre = Input::get('nombreS');
                  $s->save();
                  $order = new Orden();
                  $order->seccion = $s->id;
                  $order->save();
                  return Redirect::to('/#Administrar')->with("nuevaS", "Se agreg&oacute la secci&oacuten");
          }
          return Redirect::to('/#Administrar')->with("errorS", "Por favor ingrese el nombre de la secci&oacuten");
      }
    } catch (Exception $e) {
      return Redirect::to('/#Administrar')->with("errorS", "Error agregando la secci&oacuten");
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @return \Illuminate\Http\Response
   */
  public function delete()
  {
    try {
      if (Auth::check()) {
        //verificar si hay Secciones
        if(count(Seccion::all())==0){
          return Redirect::to('/#Administrar')->with("errorS", "No hay secciones para eliminar");
        }
        $s=Seccion::where('id','=',Input::get('eliminarS'))->get()[0];
        $publicaciones=Publicacion::where('seccion','=',$s->id)->get();
        $order=Orden::where('seccion','=',$s->id)->get()[0];

        //eliminar todas las publicaciones y sus respectivos archivos
        foreach ($publicaciones as $p) {
          if(strpos($p->vinculo, 'archivos/') === false){
            //borrado de la publicación
            $p->delete();
          }else{
            //borrado de la publicación y del archivo
            $nomArchivo=substr($p->vinculo,9);
            if(Storage::disk('public')->exists($nomArchivo)){
            Storage::disk('public')->delete($nomArchivo);
            }
            $p->delete();
          }
        }

        //eliminar la seccion seleccionada.
        $s->delete();
        $order->delete();
        return Redirect::to('/#Administrar')->with("nuevaS", "Se elimin&oacute la secci&oacuten");
      }
    } catch (ErrorException $e) {
      return Redirect::to('/#Administrar')->with("errorS", "Error eliminando la secci&oacuten");
    }
  }

  /**
   * change the position of two given sections.
   *
   * @return \Illuminate\Http\Response
   */
  public function order()
  {
    try {
      if (Auth::check()){
        //verificar si hay Secciones
        if(count(Seccion::all())==0){
          return Redirect::to('/#Administrar')->with("errorS", "No hay secciones para eliminar");
        }
        //intercambiar las posiciones de las secciones
        $order1=Orden::where('seccion','=',Input::get('Ord1S'))->get()[0];
        $order2=Orden::where('seccion','=',Input::get('Ord2S'))->get()[0];
        $aux = $order1->seccion;
        $order1->seccion = $order2->seccion;
        $order2->seccion = $aux;
        $order1->save();
        $order2->save();
        return Redirect::to('/#Administrar')->with("nuevaS", "Se modificó el orden de las secciones");

      }
    } catch (Exception $e) {
      return Redirect::to('/#Administrar')->with("errorS", "Error modificando el orden de las secciones");
    }
  }


}
