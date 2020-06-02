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
  img {
    display: inline-block;
    width: 100%; // Show 4 images in a row normally
    height: auto;
    opacity:70%
}

@media (max-width: 600px) {
  img {
    width: 100%; // Override width to show only one image in a row on smaller screens
  }
}
.overlay{
  position:absolute;
  top:0;
  left:0;
  width:100%;
  height:100%;
  background:rgb(255,250,170);
  opacity:30%;
}

  </style>

</head>
<body class="hold-transition lockscreen ">
<img src="{{asset('public/frontend/assets/img/intro/banner-bg1.png')}}" alt="" >
<div class="overlay"></div>
<div class="card-img-overlay container">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="admin"><b>Fine</b> Kraft</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Login</div>
  
  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="public/fk.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="post" action="{{url('dashboard')}}">
    {{ csrf_field() }}
      <div class="input-group">
        <input type="password" name="password" class="form-control" placeholder="password">

        <div class="input-group-append">
          <button type="submit" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->
    
  </div>
  @if(Session::has('errors'))
        <div class="alert alert-danger alert-dismissable">
          {{ Session::get('errors') }}
            @php
            Session::forget('errors');
            @endphp
            <a class="close" data-dismiss="alert">&times;</a>
    </div>
  @endif
  <!-- /.lockscreen-item -->
  <!-- <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2014-2019 <b><a href="http://adminlte.io" class="text-black">Fine kraft</a></b><br>
    All rights reserved
  </div> -->
</div>
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
