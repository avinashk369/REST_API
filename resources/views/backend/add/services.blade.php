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
                <h3 class="card-title">Add service</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{url('saveService')}}"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="">
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
                    <label for="image">Service logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" accept="image/*" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                      
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Service title</label>
                    <input type="text" class="form-control" name="title" placeholder="Service title"
                    required
								   data-validation-required-message="Please enter your email">
                  </div>

                  


                  <div class="form-group">
                    <label>Description</label>
                    <textarea name="desc" class="form-control" rows="3" placeholder="Description"></textarea>
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
                <h3 class="card-title">List of services</h3>
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
                      <td><img  width="60" height="60" src="{{asset('public/uploads/service')}}/{{$service->image}}" alt="service image"></td>
                      <td>{{$service->title}}</td>
                      <td>
                      {{$service->desc}}
                      </td>
                      <td>
                      <a href="{{url('admin/editService')}}/{{$service->id}}" class="btn btn-sm ">
                        <i class="fa fa-edit"></i>
                      </a>
                      <a href="{{url('admin/deleteService')}}/{{$service->id}}" class="btn-sm btn-danger">
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