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
              @if(Session::has('errors'))
                <div class="col-sm-12">
                    <div class="alert alert-danger alert-dismissable">
                      {{ Session::get('errors') }}
                        @php
                        Session::forget('errors');
                        @endphp
                        <a class="close" data-dismiss="alert">&times;</a>
                    </div>
                </div>
              @endif
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Declare reslut</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{url('game/saveResult')}}/{{$game->id}}"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="game_id" value="{{$game->id}}">
                <div class="card-body">
                  <div class="form-group ">
                    <label>Game name</label>
                    <input type="text" class="form-control" name="name" value="{{$game->name}}" placeholder="Game name" disabled>
                    
                  </div>

                  <div class="form-group">
                    <label>Game tag line</label>
                    <input type="text" class="form-control" name="tag_line" value="{{$game->tag_line}}" placeholder="Game tag line" disabled>
                    
                  </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Draw left number</label>
                                <input type="text" class="form-control {{ $errors->has('l_num') ? ' is-invalid' : '' }}" name="l_num" value="{{old('l_num')}}" placeholder="0">
                                @if ($errors->has('l_num'))
                                    <span class="text-danger font-italic small">
                                        {{ $errors->first('l_num') }}
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="col-sm-4">
                            <div class="form-group">
                                <label>Draw right number</label>
                                <input type="text" class="form-control {{ $errors->has('r_num') ? ' is-invalid' : '' }}" name="r_num" value="{{old('r_num')}}" placeholder="0">
                                @if ($errors->has('r_num'))
                                    <span class="text-danger font-italic small">
                                        {{ $errors->first('r_num') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                        <div class="form-group">
                            <label>Draw pair number</label>
                            <input type="text" class="form-control {{ $errors->has('pair_num') ? ' is-invalid' : '' }}" name="pair_num" value="{{old('pair_num')}}" placeholder="0,0">
                            @if ($errors->has('pair_num'))
                                <span class="text-danger font-italic small">
                                    {{ $errors->first('pair_num') }}
                                </span>
                            @endif
                        </div>
                        </div>
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
