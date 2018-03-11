<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $desc= \App\Descripcion::all();
    $secciones= \App\Seccion::all();
    $publicaciones = array();

    foreach ($secciones as $s) {
      $publicaciones[$s->nombre]=\App\Publicacion::where("seccion", "=", $s->id)->get();
    }

    return view('resume', compact('desc', 'secciones', 'publicaciones'));
});

//Auth::routes();
