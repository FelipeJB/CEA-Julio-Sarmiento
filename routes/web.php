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

Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/home', function () {
  return redirect('/');
});

Route::post('passwordUpdate', 'Controller@updatePassword');

//Auth::routes();
