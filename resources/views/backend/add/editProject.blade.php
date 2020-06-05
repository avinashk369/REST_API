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
                <h3 class="card-title">Edit projects</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{url('saveProjects')}}"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-danger alert-dismissable">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}
                                <a class="close" data-dismiss="alert">&times;</a>
                              </li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <div class="form-group">
                    <label>Project header</label>
                    <input type="text" class="form-control" name="header" value="{{$data->header}}" placeholder="Service title">
                  </div>

                <div class="form-group">
                    <label for="image">Project image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" accept="image/*" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                      
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Project title</label>
                    <input type="text" class="form-control" value="{{$data->title}}" name="title" placeholder="Service title">
                  </div>

                  


                  <div class="form-group">
                    <label>Project desc</label>
                    <textarea name="desc" class="form-control" rows="3" placeholder="Description">{{$data->desc}}</textarea>
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
                <h3 class="card-title">List of projects</h3>
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
                      <td><img  width="60" height="60" src="{{asset('public/uploads/projects')}}/{{$service->image}}" alt="service image"></td>
                      <td>{{$service->title}}</td>
                      <td>
                      {{$service->header}}
                      </td>
                      <td>
                      <a href="{{url('admin/editProject')}}/{{$service->id}}" class="btn btn-sm ">
                        <i class="fa fa-edit"></i>
                      </a>
                      <a href="{{url('admin/deleteProject')}}/{{$service->id}}" class="btn-sm btn-danger">
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
