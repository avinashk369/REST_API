<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Black horse | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/css/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/css/tempusdominus-bootstrap-4.min.css')}}" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/backend/css/adminlte.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{url('exit')}}">
          <i class="fa fa-power-off" aria-hidden="true"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-warning elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin')}}" class="brand-link">
      <img src="{{asset('public/backend/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Fine Kraft</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="backend/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
 -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          
          <!-- <li class="nav-item">
            <a href="{{url('gameType')}}" class="nav-link">
              <i class="nav-icon fa fa-globe"></i>
              <p>Game types</p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="{{url('games')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>Manage Games</p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="{{url('admin/service')}}" class="nav-link">
              <i class="nav-icon fa fa-cubes"></i>
              <p>Manage services</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/aboutus')}}" class="nav-link">
              <i class="nav-icon fa fa-address-card"></i>
              <p>Manage about us</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('admin/projects')}}" class="nav-link">
              <i class="nav-icon fas fa fa-hashtag"></i>
              <p>Projects</p>
            </a>
          </li> -->
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <section class="content">
        @yield('content')
  </section>

  <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="http://adminlte.io">Black horse</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- AdminLTE App -->
<script src="{{asset('public/backend/js/adminlte.js')}}"></script>
<script src="{{asset('public/backend/js/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('public/backend/js/toastr.min.js')}}"></script>
<script src="{{asset('public/backend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/backend/js/bs-custom-file-input.min.js')}}"></script>
<script src="{{asset('public/backend/js/moment.min.js')}}"></script>
<script src="{{asset('public/backend/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    //Timepicker
  $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
  });

</script>
<script type="text/javascript">
    $(document).ready(function () {
    bsCustomFileInput.init();
    });
</script>
</body>
</html>
