<!DOCTYPE html>
<?php
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
} ?>

<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('favicon.png') }}" />

    <title>Julio Sarmiento</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ URL::asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i') }}" rel="stylesheet">
    <link href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">

  </head>

  <body id="page-top">


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Julio Alejandro Sarmiento Sabogal</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ URL::asset('img/profile.JPG') }}" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Acerca de</a>
          </li>
          @foreach($secciones as $s)
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#{{clean($s->nombre)}}">{{$s->nombre}}</a>
          </li>
          @endforeach
          @if (!Auth::guest())
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#Administrar">Administrar</a>
          </li>
          @endif
        </ul>
      </div>
    </nav>
    @if (Auth::guest())
      <div style="position:fixed; right:15px; top:20px;"><a id="ab" href="{{url('/login')}}" data-toggle="tooltip" title="Ingresar"><h4 class="icon-login"></h4><a></div>
    @else
      <div style="position:fixed; right:15px; top:20px;"><a id="ab" href="{{url('/logout')}}" data-toggle="tooltip" title="Salir"><h4 class="icon-logout"></h4><a></div>
    @endif
    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
          <h2 class="mb-0">Julio Alejandro Sarmiento Sabogal</h2><br>

          @if(Session::has('nuevaDatos'))

              <div class="alert alert-dismissible alert-success" style="width:380px">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Hecho! </strong> {!! Session::get('nuevaDatos') !!}
              </div>

          @endif
          @if(Session::has('errorDatos'))

              <div class="alert alert-dismissible alert-danger" style="width:380px">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error! </strong> {!! Session::get('errorDatos') !!}
              </div>

          @endif

          @if ($datos->cargo!="" and $datos->cargo!=" " and $datos->cargo!=null)
          <div class="subheading">{{$datos->cargo}}</div>
          @endif

          @if ($datos->departamento!="" and $datos->departamento!=" " and $datos->departamento!=null)
            @if ($datos->facultad!="" and $datos->facultad!=" " and $datos->facultad!=null)
              <div class="subheading">{{$datos->departamento}} · {{$datos->facultad}}</div>
            @else
              <div class="subheading">{{$datos->departamento}}</div>
            @endif
          @else
            @if ($datos->facultad!="" and $datos->facultad!=" " and $datos->facultad!=null)
              <div class="subheading">{{$datos->facultad}}</div>
            @endif
          @endif

          @if ($datos->telefono!="" and $datos->telefono!=" " and $datos->telefono!=null)
            @if ($datos->fax!="" and $datos->fax!=" " and $datos->fax!=null)
              <div class="subheading"><i class="icon-phone"></i> {{$datos->telefono}} · Fax {{$datos->fax}}</div>
            @else
              <div class="subheading"><i class="icon-phone"></i> {{$datos->telefono}}</div>
            @endif
          @else
            @if ($datos->fax!="" and $datos->fax!=" " and $datos->fax!=null)
              <div class="subheading">Fax {{$datos->fax}}</div>
            @endif
          @endif

          @if ($datos->compania!="" and $datos->compania!=" " and $datos->compania!=null)
          <div class="subheading">{{$datos->compania}}</div>
          @endif

          @if ($datos->correo!="" and $datos->correo!=" " and $datos->correo!=null)
          <div class="subheading"><a href="mailto:{{$datos->correo}}">{{$datos->correo}}</a></div>
          @endif

          @foreach ($info as $i)
            <div class="subheading">{{$i->descripcion}}</div>
          @endforeach

          <div class="mb-3"></div>


          @if (!Auth::guest())

              <div class="mb-3">
                  <button type="button" class="btn btn-info editarDatos" onclick="editarDatos({{$datos}})" style="width:175px">Editar Información</button>
                  <button type="button" class="btn btn-success agregarDatos" onclick="agregarDatos()" style="width:175px">Agregar Dato</button>
                  <button type="button" class="btn btn-danger eliminarDatos" onclick="eliminarDatos({{$info}})" style="width:175px">Eliminar Dato</button>
              </div>

              <div class="EditarDatos mb-3">
                          <form style="display:none" class="col-sm-8 contentEditarDatos" method="POST" action="/DatosEditar" >
                              <div class="form-group formEditDatos">
                                  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                  <label for="selCampo">Seleccione el campo que desea editar</label>
                                  <select onchange="llenarDatos({{$datos}})"class="form-control selCampo mb-1" id="selCampo" name="selCampo" style="width:380px">
                                    <option value="Cargo">Cargo</option>
                                    <option value="Departamento">Departamento</option>
                                    <option value="Facultad">Facultad</option>
                                    <option value="Telefono">Teléfono</option>
                                    <option value="Fax">Fax</option>
                                    <option value="Compania">Compañía</option>
                                    <option value="Correo">Correo</option>
                                  </select>
                                  <label for="nombreValor">Ingrese el nuevo valor</label>
                                  <input type="text" class="form-control mb-1" id="nombreValor" name="nombreValor" style="width:380px">
                              </div>
                              <p>Dejar el nuevo valor vacío no mostrará el campo en la página inicial</p>
                              <button type="submit" class="btn btn-default">Guardar</button>
                              <a onclick="cancelarDatosE()" class="btn">Cancelar</a>
                          </form>
              </div>
              <div class="AgregarDatos mb-3">
                          <form style="display:none" class="col-sm-8 contentAgregarDatos" method="POST" action="/DatosAgregar" >
                              <div class="form-group formAddDatos">
                                  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                  <label for="nombreValor">Ingrese el nuevo dato</label>
                                  <input type="text" class="form-control mb-1" id="nombreDato" name="nombreDato" style="width:380px">
                              </div>
                              <button type="submit" class="btn btn-default">Guardar</button>
                              <a onclick="cancelarDatosE()" class="btn">Cancelar</a>
                          </form>
              </div>
              <div class="EliminarDatos mb-3">
                          <form style="display:none" class="col-sm-8 contentEliminarDatos" method="POST" action="/DatosEliminar" >
                              <div class="form-group formDeleteDatos">
                                  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                  <label for="selD">Seleccione el dato que desea eliminar</label>
                                  <select class="form-control selD" id="selD" name="eliminarD" style="width:380px"></select>
                              </div>
                              <button type="submit" class="btn btn-default">Eliminar</button>
                              <a onclick="cancelarDatosE()" class="btn">Cancelar</a>
                          </form>
              </div>


          @endif


          @if(Session::has('nuevaD'))

              <div class="alert alert-dismissible alert-success" style="width:380px">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Hecho! </strong> {!! Session::get('nuevaD') !!}
              </div>

          @endif
          @if(Session::has('errorD'))

              <div class="alert alert-dismissible alert-danger" style="width:380px">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error! </strong> {!! Session::get('errorD') !!}
              </div>

          @endif

          @if (count($desc)!=0)
               <p class="mb-3">{{$desc[0]->descripcion}}</p>
          @endif

          @if (!Auth::guest())

            @if (count($desc)!=0 and $desc[0]->descripcion!="" and $desc[0]->descripcion!=" ")
              <div class="mb-3">
                  <button type="button" class="btn btn-info edD" onclick="editarDescripcion()" style="width:175px">Editar Descripción</button>
                  <button type="button" class="btn btn-danger delD" onclick="eliminarDescripcion()" style="width:175px">Eliminar Descripción</button>
              </div>

              <div class="editarD mb-3">
                          <form style="display:none" class="col-sm-8 contentEditarD" method="POST" action="/DescripcionEditar" >
                              <div class="form-group formEdD">
                                  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                  <label for="descD">Descripción</label>
                                <textarea type="textarea" class="form-control mb-1" id="descD" name="descD" rows="3">{{$desc[0]->descripcion}}</textarea>
                              </div>
                              <button type="submit" class="btn btn-default">Actualizar</button>
                              <a onclick="cancelarD()" class="btn">Cancelar</a>
                          </form>
              </div>
              <div class="eliminarD mb-3">
                          <form   style="display:none" class="col-sm-12 contentEliminarD" method="POST" action="/DescripcionEliminar">
                              <div class="form-group formDelD">
                                  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                  <p>¿Seguro que desea eliminar la descripción actual?<p>
                              </div>
                              <button type="submit" class="btn btn-default">Eliminar</button>
                              <a onclick="cancelarD()" class="btn">Cancelar</a>
                          </form>
              </div>

            @else
              <div class="mb-3">
                  <button type="button" class="btn btn-success addP" onclick="agregarDescripcion()" style="width:175px">Agregar Descripción</button>
              </div>

              <div class="AgregarD mb-3">
                          <form style="display:none" class="col-sm-8 contentAgregarD" method="POST" action="/DescripcionAgregar" >
                              <div class="form-group formAddD">
                                  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                  <label for="descD">Descripción</label>
                                  <textarea type="textarea" class="form-control mb-1" id="descD" name="descD" rows="3"></textarea>
                              </div>
                              <button type="submit" class="btn btn-default">Agregar</button>
                              <a onclick="cancelarDA()" class="btn">Cancelar</a>
                          </form>
              </div>
            @endif

          @endif

        </div>
      </section>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type= "text/javascript" src="{{ URL::asset('js/tab_divider.js') }}"></script>

      @foreach($secciones as $s)

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="{{clean($s->nombre)}}">
        <div class="my-auto">
          <h2 class="mb-5">{{$s->nombre}}</h2>
            <ul class="fa-ul mb-0" id="li{{clean($s->nombre)}}">
              @foreach($publicaciones[$s->nombre] as $p)
                <li>
                  @if($p->descripcion!=null) <h4><i class="fa-li fa fa-check"></i></h4><a href="{{$p->vinculo}}" target="_blank"><h4 class="mb-0">{{$p->nombre}}</h4></a><div class="mb-3">{{$p->descripcion}}</div>
                  @else <h4><i class="fa-li fa fa-check"></i></h4><a href="{{$p->vinculo}}" target="_blank"><h4 class="mb-3">{{$p->nombre}}</h4></a> @endif
                </li>
              @endforeach

            </ul>

            @if (count($publicaciones[$s->nombre])>8)

               <ul class="pagination pagination-sm" id="myPager{{clean($s->nombre)}}"></ul>

               <script>$('#li{{clean($s->nombre)}}').pageMe({pagerSelector:'#myPager{{clean($s->nombre)}}',showPrevNext:true,hidePageNumbers:false,perPage:8});</script>
            @endif

        </div>
      </section>

      @endforeach

      @if (!Auth::guest())
      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="Administrar">
        <div class="my-auto">
          <h2 class="mb-5">Administrar</h2>
          <h4 class="mb-3">Administrar Secciones</h2>

            @if(Session::has('nuevaS'))

                <div class="alert alert-dismissible alert-success" style="width:380px">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Hecho! </strong> {!! Session::get('nuevaS') !!}
                </div>

            @endif
            @if(Session::has('errorS'))

                <div class="alert alert-dismissible alert-danger" style="width:380px">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Error! </strong> {!! Session::get('errorS') !!}
                </div>

            @endif

            <div class="mb-3">
                <button type="button" class="btn btn-success addS" onclick="agregarSeccion()" style="width:175px">Agregar Sección</button>
                <button type="button" class="btn btn-danger delS" onclick="eliminarSeccion({{$secciones}})" style="width:175px">Eliminar Sección</button>
                <button type="button" class="btn btn-info ordS" onclick="ordenarSecciones({{$secciones}})" style="width:175px">Cambiar Orden</button>
            </div>

            <div class="agregarS mb-3">
                        <form style="display:none" class="col-sm-8 contentAgregarS" method="POST" action="/SeccionCrear" >
                            <div class="form-group formAddS">

                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <label for="nombreS">Nombre de la sección</label>
                                <input type="text" class="form-control" id="nombreS" name="nombreS" style="width:380px">
                            </div>
                            <button type="submit" class="btn btn-default" onclick="this.disabled=true;this.form.submit()">Agregar</button>
                            <a onclick="cancelarS()" class="btn">Cancelar</a>
                        </form>
            </div>
            <div class="eliminarS mb-3">
                        <form   style="display:none" class="col-sm-12 contentEliminarS" method="POST" action="/SeccionEliminar">
                            <div class="form-group formDelS">

                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <label for="sel1">Seleccione la sección que desea eliminar</label>
                                <select class="form-control selS" id="sel1" name="eliminarS" style="width:380px">
                                </select>
                            </div>
                            <p>Eliminar una sección borrará todas las publicaciones que esta contenga</p>
                            <button type="submit" class="btn btn-default" onclick="this.disabled=true;this.form.submit()">Eliminar</button>
                            <a onclick="cancelarS()" class="btn">Cancelar</a>
                        </form>
            </div>
            <div class="ordenarS mb-3">
                        <form   style="display:none" class="col-sm-12 contentOrdenarS" method="POST" action="/SeccionOrdenar">
                            <div class="form-group formOrdS">

                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <label for="selOrd1">Seleccione la sección que desea mover</label>
                                <select class="form-control sel1S" id="selOrd1" name="Ord1S" style="width:380px">
                                </select>
                                <label for="selOrd2">Seleccione la sección por la cual intercambiar</label>
                                <select class="form-control sel2S" id="selOrd2" name="Ord2S" style="width:380px">
                                </select>
                            </div>
                            <p>Se intercambiará la posición de las secciones seleccionadas</p>
                            <button type="submit" class="btn btn-default" onclick="this.disabled=true;this.form.submit()">Confirmar</button>
                            <a onclick="cancelarS()" class="btn">Cancelar</a>
                        </form>
            </div>
            <br>
          <h4 class="mb-3">Administrar Publicaciones</h2>

            @if(Session::has('nuevaP'))

                <div class="alert alert-dismissible alert-success" style="width:380px">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Hecho! </strong> {!! Session::get('nuevaP') !!}
                </div>

            @endif
            @if(Session::has('errorP'))

                <div class="alert alert-dismissible alert-danger" style="width:380px">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Error! </strong> {!! Session::get('errorP') !!}
                </div>

            @endif

            <div class="mb-3">
                <button type="button" class="btn btn-success addP" onclick="agregarPublicacion({{$secciones}})" style="width:175px">Agregar Publicación</button>
                <button type="button" class="btn btn-danger delP" onclick="eliminarPublicacion({{$secciones}}, {{json_encode($publicaciones)}})" style="width:175px">Eliminar Publicación</button>
            </div>

            <div class="agregarP mb-3">
                        <form style="display:none" class="col-sm-8 contentAgregarP" method="POST" action="/PublicacionCrear" enctype="multipart/form-data" >
                            <div class="form-group formAddP">

                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <label for="selAP">Seleccione la sección en la cual ubicar la publicación</label>
                                <select class="form-control selAP mb-1" id="selAP" name="selAP" style="width:380px"></select>
                                <label for="nombreP">Nombre de la publicación</label>
                                <input type="text" class="form-control mb-1" id="nombreP" name="nombreP" style="width:380px">
                                <label for="descP">Descripción</label>
                                <input type="text" class="form-control mb-1" id="descP" name="descP" style="width:380px">
                                <label for="enP">Enlace</label>
                                <input type="text" class="form-control mb-1" id="enP" name="enP" style="width:380px">
                                <label>ó &nbsp</label>
                                <label style" display: inline-block"><input type="file" name="fileToUpload" id="fileToUpload" style="display:none"><b style"cursor:pointer">Seleccionar archivo</b><span style="padding-left:2em" id="file-selected" ></span></label>
                            </div>
                            <button type="submit" class="btn btn-default" onclick="this.disabled=true;this.form.submit()">Agregar</button>
                            <a onclick="cancelarP()" class="btn">Cancelar</a>
                        </form>
            </div>
            <div class="eliminarP mb-3">
                        <form   style="display:none" class="col-sm-12 contentEliminarP" method="POST" action="/PublicacionEliminar">
                            <div class="form-group formDelP">

                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <label for="sel2">Seleccione la sección de la publicación que desea eliminar</label>
                                <select onchange="llenarP({{json_encode($publicaciones)}})" class="form-control selP mb-1" id="sel2" name="eliminarP" style="width:380px">
                                </select>
                                <label for="sel2s">Seleccione la publicación que desea eliminar</label>
                                <select class="form-control selPS mb-1" id="sel2s" name="eliminarPS" style="width:380px">
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default" onclick="this.disabled=true;this.form.submit()">Eliminar</button>
                            <a onclick="cancelarP()" class="btn">Cancelar</a>
                        </form>
            </div>

          <br>
          <h4 class="mb-3">Administrar Perfil</h2>


            @if(Session::has('nueva'))

                <div class="alert alert-dismissible alert-success" style="width:380px">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Hecho! </strong> {!! Session::get('nueva') !!}
                </div>

            @endif
            @if(Session::has('error'))

                <div class="alert alert-dismissible alert-danger" style="width:380px">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Error! </strong> {!! Session::get('error') !!}
                </div>

            @endif

            <div class="mb-3">
                <button type="button" class="btn btn-info addC" onclick="cambiarClave()" style="width:175px">Cambiar Contraseña</button>
            </div>

            <div class="cambiarC">
              <form class="col-sm-12 contentCambiarC" method="POST" action="/passwordUpdate" style="display:none">
                  <div class="form-group formCambiarC">

                      <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                      <label for="ca">Contraseña actual:</label>
                      <input type="password" class="form-control mb-1" id="ca" name="ca"  style="width:380px">
                      <label for="cn">Contraseña nueva:</label>
                      <input type="password" class="form-control mb-1" id="cn" name="cn"  style="width:380px">
                      <label for="ccn">Confirmar contraseña nueva:</label>
                      <input type="password" class="form-control mb-1" id="ccn" name="ccn"  style="width:380px">
                  </div>
                  <button type="submit" class="btn btn-default">Actualizar</button>
                  <a onclick="cancelarC()" class="btn btn-default">Cancelar</a>
              </form>
          </div>

        </div>
      </section>
      @endif

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ URL::asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ URL::asset('jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ URL::asset('js/resume.min.js') }}"></script>


  </body>

</html>
