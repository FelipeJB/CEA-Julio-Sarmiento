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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ URL::asset('img/profile.jpg') }}" alt="">
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
          <h2 class="mb-0">Julio Alejandro Sarmiento Sabogal</h2>
          <br><div class="subheading">Profesor · Investigador</div>
          <div class="subheading">Departamento de Administración · Facultad de Ciencias Económicas y Administrativas</div>
          <div class="subheading"><i class="icon-phone"></i> (571) 320 83 20 Ext. 5155 · Fax (571) 285 72 89</div>
          <div class="subheading">Pontificia Universidad Javeriana</div>
          <div class="subheading mb-5"><a href="mailto:sarmien@javeriana.edu.co">sarmien@javeriana.edu.co</a></div>

          @if (count($desc)!=0)
               <p class="mb-5">{{$desc[0]->descripcion}}</p>
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
                  @if($p->descripcion!=null) <h4><i class="fa-li fa fa-check"></i></h4><a href="{{$p->vinculo}}"><h4 class="mb-0">{{$p->nombre}}</h4></a><div class="mb-3">{{$p->descripcion}}</div>
                  @else <h4><i class="fa-li fa fa-check"></i></h4><a href="{{$p->vinculo}}"><h4 class="mb-3">{{$p->nombre}}</h4></a> @endif
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

            <div class="mb-3">
                <button type="button" class="btn btn-success addS" onclick="agregarSeccion()" style="width:175px">Agregar Sección</button>
                <button type="button" class="btn btn-danger delS" onclick="eliminarSeccion({{$secciones}})" style="width:175px">Eliminar Sección</button>
            </div>


            <div class="agregarS mb-3">
                        <form style="display:none" class="col-sm-8 contentAgregarS" method="POST" action="/SeccionCrear" >
                            <div class="form-group formAddS">

                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <label for="nombreS">Nombre de la sección</label>
                                <input type="text" class="form-control" id="nombreU" name="nombreU" style="width:380px">
                            </div>
                            <button type="submit" class="btn btn-default">Agregar</button>
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
                            <button type="submit" class="btn btn-default">Eliminar</button>
                            <a onclick="cancelarS()" class="btn">Cancelar</a>
                        </form>
            </div>
            <br>
          <h4 class="mb-3">Administrar Publicaciones</h2>

            <div class="mb-3">
                <button type="button" class="btn btn-success addP" onclick="agregarPublicacion()" style="width:175px">Agregar Publicación</button>
                <button type="button" class="btn btn-danger delP" onclick="eliminarPublicacion({{$secciones}}, {{json_encode($publicaciones)}})" style="width:175px">Eliminar Publicación</button>
            </div>

            <div class="agregarP mb-3">
                        <form style="display:none" class="col-sm-8 contentAgregarP" method="POST" action="/SeccionCrear" >
                            <div class="form-group formAddP">

                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <label for="nombreP">Nombre de la publicación</label>
                                <input type="text" class="form-control mb-1" id="nombreP" name="nombreP" style="width:380px">
                                <label for="descP">Descripción</label>
                                <input type="text" class="form-control mb-1" id="descP" name="descP" style="width:380px">
                                <label for="enP">Enlace</label>
                                <input type="text" class="form-control mb-1" id="enP" name="enP" style="width:380px">
                                <label>ó &nbsp</label><a href="#">Seleccionar archivo</a>
                            </div>
                            <button type="submit" class="btn btn-default">Agregar</button>
                            <a onclick="cancelarP()" class="btn">Cancelar</a>
                        </form>
            </div>
            <div class="eliminarP mb-3">
                        <form   style="display:none" class="col-sm-12 contentEliminarP" method="POST" action="/SeccionEliminar">
                            <div class="form-group formDelP">

                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <label for="sel2">Seleccione la sección de la publicación que desea eliminar</label>
                                <select onchange="llenarP({{json_encode($publicaciones)}})" class="form-control selP mb-1" id="sel2" name="eliminarP" style="width:380px">
                                </select>
                                <label for="sel2s">Seleccione la publicación que desea eliminar</label>
                                <select class="form-control selPS mb-1" id="sel2s" name="eliminarPS" style="width:380px">
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Eliminar</button>
                            <a onclick="cancelarP()" class="btn">Cancelar</a>
                        </form>
            </div>

          <br>
          <h4 class="mb-3">Administrar Perfil</h2>

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
