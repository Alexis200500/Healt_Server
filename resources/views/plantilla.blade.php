<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset ('Plantilla/assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ URL::asset ('Plantilla/assets/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Administración
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{URL::asset ('Plantilla/assets/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{URL::asset ('Plantilla/assets/demo/demo.css') }}" rel="stylesheet" />

  <script src="{{URL::asset ('Modulos/jquery-3.6.0.min.js') }}"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../Plantilla/assets/img/sidebar-1.jpg">
      <div class="logo"><a href="{{route('principal')}}" class="simple-text logo-normal">
          <img src="{{ asset ('Login/images/clinicalogo.png') }}" alt="IMG" height="150" width="150">
        </a></div>
        
      <div class="sidebar-wrapper">
        <ul class="nav">
        <?php $sessiontipom = session('sessiontipom'); ?>
        <?php $sessiontipou = session('sessiontipo'); ?>
          @if($sessiontipom=="medico")
          <li class="nav-item active">
            <a class="nav-link" href="{{ route ('reportemedicos') }}">
              <i class="material-icons">person</i>
              <p>Médicos y consultorios</p>
            </a>
          </li>
          
          <li class="nav-item active">
            <a class="nav-link" href="{{ route ('/Evento/index') }}">
              <i class="material-icons">content_paste</i>
              <p>Calendario</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route ('reporte_consultas') }}">
              <i class="material-icons">dashboard</i>
              <p>Consultas</p>
            </a>
          </li>
          <!--<li class="nav-item active">
            <a class="nav-link" href="{{ route ('encuesta_covid') }}">
              <i class="material-icons">dashboard</i>
              <p>Encuenta Covid</p>
            </a>
          </li> -->
          <li class="nav-item active">
            <a class="nav-link" href="{{ route ('encuesta_covid') }}">
              <i class="material-icons">dashboard</i>
              <p>Encuenta Covid</p>
            </a>
          </li>
          @else
          <li class="nav-item active">
            <a class="nav-link" href="{{ route ('reportemedicos') }}">
              <i class="material-icons">person</i>
              <p>Médicos y consultorios</p>
            </a>
          </li>
          
          <li class="nav-item active">
            <a class="nav-link" href="{{ route ('/Evento/index') }}">
              <i class="material-icons">content_paste</i>
              <p>Calendario</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route ('reporte_consultas') }}">
              <i class="material-icons">dashboard</i>
              <p>Consultas</p>
            </a>
          </li>
          <!--<li class="nav-item active">
            <a class="nav-link" href="{{ route ('encuesta_covid') }}">
              <i class="material-icons">dashboard</i>
              <p>Encuenta Covid</p>
            </a>
          </li> -->
          <li class="nav-item active">
            <a class="nav-link" href="{{ route ('encuesta_covid') }}">
              <i class="material-icons">dashboard</i>
              <p>Encuesta Covid</p>
            </a>
          </li> 
          
          @endif
          
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">HEALTH SERVER </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            
            <ul class="navbar-nav">


              <li class="nav-item dropdown">
                <a class="nav-link" href="" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                 
                  <!--<a class="dropdown-item" href="{{ route('pacientesusuario') }}">Ser nuevo Paciente</a> -->
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('/') }}">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- Contenido -->
      <div class="content">
        @yield('contenido')
        <?php 
        
        $sessionusuario = session('sessionusuario');
        $sessiontipou = session('sessiontipo');
        $sessionidusuario = session('sessionidusuario');
        $sessiontipom = session('sessiontipom');
        ?>


      </div>
      <!-- Final de contenido -->

      <footer class="footer">

      </footer>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="{{ URL::asset ('Plantilla/assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ URL::asset ('Plantilla/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ URL::asset ('Plantilla/assets/js/core/bootstrap-material-design.min.js') }}"></script>
  <script src="{{ URL::asset ('Plantilla/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- Plugin for the momentJs  -->
  <script src="{{ URL::asset ('Plantilla/assets/js/plugins/moment.min.js') }}"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{ URL::asset ('Plantilla/assets/js/plugins/sweetalert2.js') }}"></script>
  <!-- Forms Validations Plugin -->
  <script src="{{ URL::asset ('Plantilla/assets/js/plugins/jquery.validate.min.js') }}"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{ URL::asset ('Plantilla/assets/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{ URL::asset ('Plantilla/assets/js/plugins/bootstrap-selectpicker.js') }}"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{{ URL::asset ('Plantilla/assets/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="{{ URL::asset ('Plantilla/assets/js/plugins/jquery.dataTables.min.js') }}"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{ URL::asset ('Plantilla/assets/js/plugins/bootstrap-tagsinput.js') }}"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{ URL::asset ('Plantilla/assets/js/plugins/jasny-bootstrap.min.js') }}"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{{ URL::asset ('Plantilla/assets/js/plugins/fullcalendar.min.js') }}"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="{{ URL::asset ('Plantilla/assets/js/plugins/jquery-jvectormap.js') }}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ URL::asset ('Plantilla/assets/js/plugins/nouislider.min.js') }}"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="{{ URL::asset ('Plantilla/assets/js/plugins/arrive.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="{{ URL::asset ('Plantilla/assets/js/plugins/chartist.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ URL::asset ('Plantilla/assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ URL::asset ('Plantilla/assets/js/material-dashboard.js?v=2.1.2') }}" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ URL::asset ('Plantilla/assets/demo/demo.js') }}"></script>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>
