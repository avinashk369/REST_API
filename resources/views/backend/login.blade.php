<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Fine Kraft | Lockscreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/css/toastr.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/backend/css/adminlte.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


 <style>
 .bg-img{
  background: url('{{asset('public/backend/img/photo1.png')}}') no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;
 }
 </style> 
</head>
<body class="hold-transition login-page bg-img">
<!-- Automatic element centering -->
<div class="login-box">
  <div class="login-logo">
    <img class="img-circle" src="{{asset('public/logo.png')}}" height="120"/>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
        @if(Session::has('errors'))
          <div class="alert alert-danger alert-dismissable">
            {{ Session::get('errors') }}
              @php
              Session::forget('errors');
              @endphp
              <a class="close" data-dismiss="alert">&times;</a>
          </div>
        @endif
      <form method="post" action="{{url('login')}}">
      {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="User name" name="user_name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
<!-- /.login-box -->
<!-- /.center -->
</div>

<!-- jQuery -->
<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('public/backend/js/bootstrap.bundle.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{asset('public/backend/js/adminlte.js')}}"></script>
</body>
</html>
