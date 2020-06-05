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
                <h3 class="card-title">Add banner</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{url('saveHome')}}"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="">
                <div class="card-body">
                
                <div class="form-group">
                    <label for="image">Service logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}" accept="image/*" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                        @if ($errors->has('image'))
                            <span class="text-danger font-italic small">
                                {{ $errors->first('image') }}
                            </span>
                        @endif
                      </div>
                      
                    </div>
                  </div>

                  <div class="form-group ">
                    <label>Service title</label>
                    <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{old('title')}}" placeholder="Service title">
                    @if ($errors->has('title'))
                        <span class="text-danger font-italic small">
                            {{ $errors->first('title') }}
                        </span>
                    @endif
                  </div>

                  


                  <div class="form-group">
                    <label>Description</label>
                    <textarea name="header" class="form-control {{ $errors->has('header') ? ' is-invalid' : '' }}" rows="3" placeholder="Description">{{old('header')}}</textarea>
                    @if ($errors->has('header'))
                            <span class="text-danger font-italic small">
                                {{ $errors->first('header') }}
                            </span>
                    @endif
                  </div>

                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-primary">Submit</button>
                </div>
              </form>
              
            </div>
            <!-- /.card -->

            

          </div>

          <div class="col-md-6">
            <!-- -->

        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Banner images</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($services as $key=>$service )
                    <tr>
                      <td>{{++$key}}</td>
                      <td><img  width="60" height="60" src="{{asset('public/uploads/homes')}}/{{$service->image}}" alt="service image"></td>
                      <td>{{$service->title}}</td>
                      <td>
                      {{$service->header}}
                      </td>
                      <td>
                      <a href="{{url('admin/editBanner')}}/{{$service->id}}" class="btn btn-sm ">
                        <i class="fa fa-edit"></i>
                      </a>
                      <a href="{{url('admin/deleteBanner')}}/{{$service->id}}" class="btn-sm btn-danger">
                        <i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
                  

<!-- -->  
          </div>
        </div><!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </div>
  </div>

  
@stop
