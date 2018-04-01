<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Publicacion;
use App\Seccion;
use Auth;
use Redirect;

class PublicacionController extends Controller
{

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      if (Auth::check()){
        if (Input::file('fileToUpload')!=null and (Input::get('enP')!=null and Input::get('enP')!="" and Input::get('enP')!=" ")){
          return Redirect::to('/#Administrar')->with("errorP", "Se debe ingresar un enlace o archivo, pero no ambos campos");
        }

        if(count(Seccion::all())>0){
          if (Input::get('nombreP')!=null && Input::get('nombreP')!="" && Input::get('nombreP')!=" "){
            if (Input::file('fileToUpload')!=null or (Input::get('enP')!=null and Input::get('enP')!="" and Input::get('enP')!=" ")){
              if(Input::file('fileToUpload')!=null){
                //agregar publicación con archivo
                $p = new Publicacion();
                $p->nombre = Input::get('nombreP');
                if(Input::get('descP')!=null){
                  $p->descripcion = Input::get('descP');
                }
                $p->seccion = Input::get('selAP');
                //cargar archivo
                if(Storage::disk('public')->exists(Input::file('fileToUpload')->getClientOriginalName())){
                  return Redirect::to('/#Administrar')->with("errorP", "Ya se ha subido un archivo llamado ".Input::file('fileToUpload')->getClientOriginalName().". Cambie el nombre del archivo e intente de nuevo");
                }else{
                  Storage::putFileAs('public', Input::file('fileToUpload'), Input::file('fileToUpload')->getClientOriginalName());
                  $p->vinculo = "archivos/".Input::file('fileToUpload')->getClientOriginalName();
                }
                $p->save();
                return Redirect::to('/#Administrar')->with("nuevaP", "Se agreg&oacute la publicaci&oacuten");
              }else{
                //agregar publicación con enlace
                $p = new Publicacion();
                $p->nombre = Input::get('nombreP');
                if(Input::get('descP')!=null){
                  $p->descripcion = Input::get('descP');
                }
                $p->seccion = Input::get('selAP');
                if (strpos(Input::get('enP'), 'http') === false) {
                  $p->vinculo = 'http://' .Input::get('enP');
                }else{
                  $p->vinculo = Input::get('enP');
                }
                $p->save();
                return Redirect::to('/#Administrar')->with("nuevaP", "Se agreg&oacute la publicaci&oacuten");
              }
            }
            return Redirect::to('/#Administrar')->with("errorP", "Por favor seleccione un archivo o ingrese un enlace");
          }
          return Redirect::to('/#Administrar')->with("errorP", "Por favor ingrese el nombre de la publicaci&oacuten");
        }
        return Redirect::to('/#Administrar')->with("errorP", "No hay secciones en donde agregar la publicaci&oacuten");
      }
  }


}
