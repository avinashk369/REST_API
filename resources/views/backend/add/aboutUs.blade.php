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
                <h3 class="card-title">About us</h3>
              </div>
              <!-- /.card-header -->
              @if($data == "")
              <!-- form start -->
              <form role="form" method="post" action="{{url('saveAboutus')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="">
                <div class="card-body">
                
              
              

                <div class="form-group">
                    <label>About us </label>
                    <textarea name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5" placeholder="About us"></textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger font-italic small">
                            {{ $errors->first('description') }}
                        </span>
                    @endif
                </div>

                  <div class="form-group">
                    <label for="wh_image">What we do image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="wh_image" name="wh_image">
                        <label class="custom-file-label" for="wh_image">Choose file</label>
                      </div>
                      
                    </div>
                  </div>


                  <div class="form-group">
                    <label>What we do</label>
                    <textarea name="wh_desc" class="form-control" rows="3" placeholder="What we do"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="mi_image">Our mission image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="mi_image" name="mi_image">
                        <label class="custom-file-label" for="mi_image">Choose file</label>
                      </div>
                      
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Our mission statement</label>
                    <textarea name="mi_desc" class="form-control" rows="3" placeholder="Our mission statement"></textarea>
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-primary">Submit</button>
                </div>
              </form>
              @else
              <!-- form start -->
              <form role="form" method="post" action="{{url('saveAboutus')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="card-body">
                
              
              

              <div class="form-group">
                    <label>About us </label>
                    <textarea name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5" placeholder="About us">{{$data->description}}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger font-italic small">
                            {{ $errors->first('description') }}
                        </span>
                    @endif
                </div>

                  <div class="form-group">
                    <label for="wh_image">What we do image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" accept="image/*" class="custom-file-input" id="wh_image" name="wh_image">
                        <label class="custom-file-label" for="wh_image">Choose file</label>
                        
                      </div>
                      <div class="col-md-2">
                        <div class="widget-user-image">
                        <img class="img-circle elevation-2" width="60" height="60" src="{{asset('public/uploads')}}/{{$data->wh_image}}" alt="User Avatar">
                        </div>
                    </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label>What we do</label>
                    <textarea name="wh_desc" class="form-control" rows="3" placeholder="What we do">{{$data->wh_desc}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="mi_image">Our mission image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="mi_image" name="mi_image">
                        <label class="custom-file-label" for="mi_image">Choose file</label>
                        
                      </div>
                      <div class="col-md-2">
                        <div class="widget-user-image">
                        <img class="img-circle elevation-2" width="60" height="60" src="{{asset('public/uploads')}}/{{$data->mi_image}}" alt="User Avatar">
                        </div>
                    </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Our mission statement</label>
                    <textarea name="mi_desc" class="form-control" rows="3" placeholder="Our mission statement">{{$data->mi_desc}}</textarea>
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
