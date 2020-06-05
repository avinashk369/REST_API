@extends('backend.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
        @if(Session::has('success'))
                <div class="col-sm-12">
                    <div class="alert alert-success alert-dismissable">
                      {{ Session::get('success') }}
                        @php
                        Session::forget('success');
                        @endphp
                        <a class="close" data-dismiss="alert">&times;</a>
                    </div>
                </div>
              @endif
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Manage Game types</h3>
              </div>
              @foreach($game_types as $type )
              <p>{{$type->name}}</p>
              @endforeach
            </div>
            <!-- /.card -->

            

          </div>

          <!-- <div class="col-md-2">
            <div class="widget-user-image">
              <img class="img-circle elevation-2" src="backend/img/user2-160x160.jpg" alt="User Avatar">
            </div>
          </div> -->
        </div><!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </div>
  </div>
@stop
