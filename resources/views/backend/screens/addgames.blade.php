@extends('backend.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
        <!--  -->
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
                <h3 class="card-title">Add new game</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{url('game/add')}}"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="">
                <input type="hidden" name="is_offer" value="0">
                <input type="hidden" name="flags" value="10000">
                <div class="card-body">
                  <div class="form-group ">
                    <label>Game name</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{old('name')}}" placeholder="Game name">
                    @if ($errors->has('name'))
                        <span class="text-danger font-italic small">
                            {{ $errors->first('name') }}
                        </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label>Game tag line</label>
                    <input type="text" class="form-control {{ $errors->has('tag_line') ? ' is-invalid' : '' }}" name="tag_line" value="{{old('tag_line')}}" placeholder="Game tag line">
                    @if ($errors->has('tag_line'))
                        <span class="text-danger font-italic small">
                            {{ $errors->first('tag_line') }}
                        </span>
                    @endif
                  </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Prize on left number</label>
                                <input type="text" class="form-control {{ $errors->has('l_num_prize') ? ' is-invalid' : '' }}" name="l_num_prize" value="{{old('l_num_prize')}}" placeholder="0.00">
                                @if ($errors->has('l_num_prize'))
                                    <span class="text-danger font-italic small">
                                        {{ $errors->first('l_num_prize') }}
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="col-sm-4">
                            <div class="form-group">
                                <label>Prize on right number</label>
                                <input type="text" class="form-control {{ $errors->has('r_num_prize') ? ' is-invalid' : '' }}" name="r_num_prize" value="{{old('r_num_prize')}}" placeholder="0.00">
                                @if ($errors->has('r_num_prize'))
                                    <span class="text-danger font-italic small">
                                        {{ $errors->first('r_num_prize') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                        <div class="form-group">
                            <label>Prize on pair number</label>
                            <input type="text" class="form-control {{ $errors->has('p_num_prize') ? ' is-invalid' : '' }}" name="p_num_prize" value="{{old('p_num_prize')}}" placeholder="0.00">
                            @if ($errors->has('p_num_prize'))
                                <span class="text-danger font-italic small">
                                    {{ $errors->first('p_num_prize') }}
                                </span>
                            @endif
                        </div>
                        </div>
                    </div>

                  

                  <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label>Time picker:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="text" name="result_time" class="form-control datetimepicker-input" data-target="#timepicker" placeholder="00:00 AM"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                      </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
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

        </div><!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </div>
  </div>
@stop
