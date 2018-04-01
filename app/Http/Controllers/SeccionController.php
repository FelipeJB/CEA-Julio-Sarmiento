<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Publicacion;
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

  /**
   * Remove the specified resource from storage.
   *
   * @return \Illuminate\Http\Response
   */
  public function delete()
  {
      if (Auth::check()) {
        //verificar si hay Secciones
        if(count(Seccion::all())==0){
          return Redirect::to('/#Administrar')->with("errorS", "No hay secciones para eliminar");
        }
        $s=Seccion::where('id','=',Input::get('eliminarS'))->get()[0];
        $publicaciones=Publicacion::where('seccion','=',$s->id)->get();

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
        return Redirect::to('/#Administrar')->with("nuevaS", "Se elimin&oacute la secci&oacuten");
      }
  }


}
