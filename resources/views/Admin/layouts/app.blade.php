<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ DB::table('settings')->value('App_name') }} - @yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel = "icon" href = "{{ asset('image/icon.png') }}" type = "image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('admin/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
        <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/skin-black.min.css') }}">

  <link rel="stylesheet" href="{{ asset('admin/plugins/pace/pace.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/notification/css/toastr.css') }}">

  <link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="{{ asset('admin/dist/js/jquery.min.js') }}"></script>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style>
            .border-green {
                border-color: green;
                color: green;
                }

                .border-red {
                border-color: red;
                color: red;
            }
            .qty-error{
                border-color: red;
                color: red;
            }
            .rate-error{
                border-color: red;
                color: red;
            }
            .product-error{
                border-color: red;
                color: red;
            }
            .desc-error{
                border-color: red;
                color: red;
            }
            .type-error{
                border-color: red;
                color: red;
            }

        </style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>li</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{ DB::table('settings')->value('App_name') }}</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- /.messages-menu -->
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{ asset('image/'.auth()->user()->image) }}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{ asset('image/'.auth()->user()->image) }}" class="img-circle" alt="User Image">

                <p>
                    {{ auth()->user()->name }} - Manager
                  <small>Member since Nov. {{ auth()->user()->created_at->diffForHumans() }}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ Route('Profile') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ URL::to('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>

            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('image/'.auth()->user()->image) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->name }}</p>
          <!-- Status -->
          <a href="{{ Route('Profile') }}">Manager</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="{{ Request::is('/') ? 'active' : '' }}">
        <a href="{{ url::to('/') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="{{ Request::is('Create-Box') ? 'active' : '' }} {{ Request::is('Box-manage') ? 'active' : '' }} treeview">
            <a href="#"><i class="fa fa-archive"></i> <span>Box</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is('Create-Box') ? 'active' : '' }}"><a href="{{ Route('Create-Box') }}">Add Box</a></li>
              <li class="{{ Request::is('Box-manage') ? 'active' : '' }}"><a href="{{ Route('Box-manage') }}">Box Manage</a></li>
            </ul>
          </li>
          <li class="{{ Request::is('Create-Customer') ? 'active' : '' }}  {{ Request::is('Customer-manage') ? 'active' : '' }} treeview">
            <a href="#"><i class="fa fa-users"></i> <span>Customer & Party</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is('Create-Customer') ? 'active' : '' }}"><a href="{{ Route('Create-Customer') }}">Add Customer & Party</a></li>
              <li class="{{ Request::is('Customer-manage') ? 'active' : '' }}"><a href="{{ Route('Customer-manage') }}">Manage Customer & Party</a></li>
            </ul>
          </li>
        <li class="{{ Request::is('Create-GIP-GOP') ? 'active' : '' }} treeview">
          <a href="#"><i class="fa fa-file-text-o"></i> <span>GIP && GOP</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('Create-GIP-GOP') ? 'active' : '' }}"><a href="{{ Route('Create-GIP-GOP') }}">Add GIP && GOP</a></li>
            <li><a href="#">Manage</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>



      @yield('content')


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Creator By {{ DB::table('settings')->value('creator') }}
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {{ date('Y') }} <a href="#">{{ DB::table('settings')->value('company_name') }}</a>.</strong> All rights reserved.
  </footer>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script type="text/javascript" src="{{ asset('admin/plugins/notification/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/plugins/notification/toastr.min.js') }}"></script>
<script>

    @if (Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch(type){
    case 'info':

    toastr.options.timeOut = 10000;
    toastr.info("{{Session::get('message')}}");
    var audio = new Audio('{{ asset('admin/plugins/notification/audio/facebook_sound.mp3') }}');
    audio.play();
    break;
    case 'success':

    toastr.options.timeOut = 10000;
    toastr.success("{{Session::get('message')}}");
    var audio = new Audio('{{ asset('admin/plugins/notification/audio/facebook_sound.mp3') }}');
    audio.play();

    break;
    case 'warning':

    toastr.options.timeOut = 10000;
    toastr.warning("{{Session::get('message')}}");
    var audio = new Audio('{{ asset('admin/plugins/notification/audio/facebook_sound.mp3') }}');
    audio.play();

    break;
    case 'error':

    toastr.options.timeOut = 10000;
    toastr.error("{{Session::get('message')}}");
    var audio = new Audio('{{ asset('admin/plugins/notification/audio/facebook_sound.mp3') }}');
    audio.play();

    break;
    }
    @endif
</script>

<!-- REQUIRED JS SCRIPTS -->
<script src="{{ asset('admin/bower_components/PACE/pace.min.js') }}"></script>
<!-- jQuery 3 -->
<script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('admin/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('admin/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<script src="{{ asset('admin/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     <script>
        $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
          $('[data-mask]').inputmask()


        });
      </script>
</body>
</html>
