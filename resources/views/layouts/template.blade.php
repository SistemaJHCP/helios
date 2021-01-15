<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Sistema Helios</title>
  <link rel="shortcut icon" href="{{ asset('imagenes/sistemas/icon.png') }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- jQuery 3 -->
  <script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('plugins/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('plugins/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('plugins/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('plugins/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('plugins/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('plugins/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('css/general.css') }}">

  @yield('css')



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> --}}
    <link rel="stylesheet" href="{{ asset('fonts/italic.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"> <img src="{{ asset('imagenes/sistemas/cab-mini.png') }}" alt="Bienvenido a Helios"> </span>
      <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"> <img src="{{ asset('imagenes/sistemas/HELIOS-BLANCO.png') }}" alt="Bienvenido a Helios"> </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ url(\Auth::user()->nombre_imagen) }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ \Auth::user()->name }} {{ \Auth::user()->lastname }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ url(\Auth::user()->nombre_imagen) }}" class="img-circle" alt="User Image">

                <p>
                    {{ \Auth::user()->name }} {{ \Auth::user()->lastname }}
                  <small>Nivel de permiso</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row" style="text-align:center;">
                    {{ \Auth::user()->email }}
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                    <a href="" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Cerrar sesión</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          {{-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> --}}
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url(\Auth::user()->nombre_imagen) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ \Auth::user()->name }} {{ \Auth::user()->lastname }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú</li>

        <li>
            <a href="{{ route('home') }}">
                <i class="fa fa-home"></i> <span>Inicio</span>
            </a>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-file-o"></i> <span>Operador</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('operador.index') }}"><i class="fa fa-folder-open-o"></i>Fólios</a></li>
                <li><a href="{{ route('operador.folioEnEspera') }}"><i class="fa fa-hourglass-o"></i>Esperando aprobación</a></li>
                <li><a href="{{ route('operador.aproCoord') }}"><i class="fa fa-folder-o"></i>Fólios cerrados</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Coordinador</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('asignacion.index') }}"><i class="fa fa-exchange"></i>Asignacion de casos</a></li>
            </ul>
        </li>

        <li>
            <a href="{{ route('levantamiento.index') }}">
                <i class="fa fa-files-o"></i> <span>Lider de cuadrilla</span>
            </a>
        </li>
        <li class="header">Configuraciones</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Configuración</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('general.index') }}"><i class="fa fa-circle-o"></i>General</a></li>
                <li><a href="{{ route('usuario.index') }}"><i class="fa fa-circle-o"></i>Opciones de usuarios</a></li>
                <li><a href="{{ route('politicas.inicio') }}"><i class="fa fa-circle-o"></i>Políticas y permisos</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('logout') }}" id="logout" class="fa fa-sign-in text-red" style="font-size:14px;">&nbsp; &nbsp;<span style="color:#b8c7ce;">Cerrar sesión</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </a>
        </li>
    </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        @yield('mini-cabecera')
    </section>

      <!-- /.row -->
      @yield('body')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  {{-- <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.00
    </div>
    <strong>Copyright &copy; 2006 - {{ date('Y') }} <a href="https:www.jhcp.com">JHCP, C.A.</a></strong> Todos los derechos reservados.
  </footer> --}}


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  @include('sweetalert::alert')
</div>
<!-- ./wrapper -->


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{ asset('plugins/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<script>
    $("#logout").on('click', function(){
        event.preventDefault(); document.getElementById('logout-form').submit();
    });
</script>
{{-- <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script> --}}

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="{{ asset('js/dashboard.js') }}"></script>-->
@yield('js')
</body>
</html>
