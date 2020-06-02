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
                <h3 class="card-title">Site settings</h3>
              </div>
              <!-- /.card-header -->
              @if($data == "")
              <!-- form start -->
              <form role="form" method="post" action="{{url('addSettings')}}">
                {{ csrf_field() }}
                <div class="card-body">
                <!-- @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif -->
              
              

                  <div class="form-group">
                    <label>Site title</label>
                    <input type="text" class="form-control" name="site_name" placeholder="Enter site title">
                  </div>

                  <!-- <div class="form-group">
                    <label for="exampleInputFile">Site logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                  </div> -->


                  <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control" rows="3" placeholder="Address"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                  </div>

                  <div class="form-group">
                    <label for="contact_no">Contact no.</label>
                    <input type="text" class="form-control" name="contact" placeholder="Contact no.">
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fab fa-lg fa-facebook-f"></i>
                      </span>
                    </div>
                    <input type="text" name="fb_handle" class="form-control" placeholder="Facebook handle">
                    
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fab fa-twitter"></i>
                      </span>
                    </div>
                    <input type="text" name="tw_handle" class="form-control" placeholder="Twitter handle">
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fab fa-lg fa-instagram"></i>
                      </span>
                    </div>
                    <input type="text" name="in_handle" class="form-control" placeholder="Instagram handle">
                  </div>

                  

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fab fa-lg fa-linkedin-in"></i>
                      </span>
                    </div>
                    <input type="text" name="li_handle" class="form-control" placeholder="Linkedin handle">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-primary">Submit</button>
                </div>
              </form>
              @else
              <!-- form start -->
              <form role="form" method="post" action="{{url('addSettings')}}">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="card-body">
                <!-- @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif -->
              
              

                  <div class="form-group">
                    <label>Site title</label>
                    <input type="text" class="form-control" value="{{$data->site_name}}" name="site_name" placeholder="Enter site title">
                  </div>

                  <!-- <div class="form-group">
                    <label for="exampleInputFile">Site logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                  </div> -->


                  <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control" rows="3"  placeholder="Address">{{$data->address}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{$data->email}}" placeholder="Enter email">
                  </div>

                  <div class="form-group">
                    <label for="contact_no">Contact no.</label>
                    <input type="text" class="form-control" name="contact" value="{{$data->contact}}" placeholder="Contact no.">
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fab fa-lg fa-facebook-f"></i>
                      </span>
                    </div>
                    <input type="text" name="fb_handle" class="form-control" value="{{$data->fb_handle}}" placeholder="Facebook handle">
                    
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fab fa-twitter"></i>
                      </span>
                    </div>
                    <input type="text" name="tw_handle" class="form-control" value="{{$data->tw_handle}}" placeholder="Twitter handle">
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fab fa-lg fa-instagram"></i>
                      </span>
                    </div>
                    <input type="text" name="in_handle" class="form-control" value="{{$data->in_handle}}" placeholder="Instagram handle">
                  </div>

                  

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fab fa-lg fa-linkedin-in"></i>
                      </span>
                    </div>
                    <input type="text" name="li_handle" class="form-control" value="{{$data->li_handle}}" placeholder="Linkedin handle">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-primary">Submit</button>
                </div>
              </form>
              @endif
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
