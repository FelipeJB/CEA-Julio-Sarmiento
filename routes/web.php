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

Route::get('archivos/{id}', function ($id) {
  if(Storage::disk('public')->exists($id)){
    return Storage::download("public/".$id);
  }
  abort(404);
});

Route::post('passwordUpdate', 'Controller@updatePassword');

Route::post('DescripcionAgregar', 'DescripcionController@create');

Route::post('DescripcionEliminar', 'DescripcionController@delete');

Route::post('DescripcionEditar', 'DescripcionController@edit');

Route::get('/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@validateRegisterShow']);

Route::post('/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@registerValidator']);

Route::post('SeccionCrear', 'SeccionController@create');

Route::post('PublicacionCrear', 'PublicacionController@create');

Route::post('PublicacionEliminar', 'PublicacionController@delete');

Route::post('SeccionEliminar', 'SeccionController@delete');
