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
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
          <h2 class="mb-0">Julio Alejandro Sarmiento Sabogal</h2>

          <br><div class="subheading">Profesor · Investigador</div>
          <div class="subheading">Departamento de Administración · Facultad de Ciencias Económicas y Administrativas</div>
          <div class="subheading">Pontificia Universidad Javeriana</div>
          <div class="subheading mb-5"><a href="mailto:sarmien@javeriana.edu.co">sarmien@javeriana.edu.co</a></div>

          @if (count($desc)!=0)
               <p class="mb-5">{{$desc[0]->descripcion}}</p>
          @endif

        </div>
      </section>

      @foreach($secciones as $s)

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="{{clean($s->nombre)}}">
        <div class="my-auto">
          <h2 class="mb-5">{{$s->nombre}}</h2>
            <ul class="fa-ul mb-0">
              @foreach($publicaciones[$s->nombre] as $p)
                <li>
                  @if($p->descripcion!=null) <h4><i class="fa-li fa fa-check"></i></h4><a href="{{$p->vinculo}}"><h4 class="mb-0">{{$p->nombre}}</h4></a><div class="mb-3">{{$p->descripcion}}</div>
                  @else <h4><i class="fa-li fa fa-check"></i></h4><a href="{{$p->vinculo}}"><h4 class="mb-3">{{$p->nombre}}</h4></a> @endif
                </li>
              @endforeach
            </ul>
        </div>
      </section>

      @endforeach

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
