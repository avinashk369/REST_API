@extends('backend.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
        
          <div class="col-md-12">
            <!-- general form elements -->
            
            <div class="card card-primary">
            
              <div class="card-header">
                <h3 class="card-title">Manage today's games</h3>
                <div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                  <a class="btn btn-dark float-right" href="{{url('game/add')}}" role="button">Add Game</a>
                  </ul>
                </div>
              </div>
              <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 110px">Result time</th>
                      <th>Name</th>
                      <th>Tag line</th>
                      <th># L Prize</th>
                      <th># R Prize</th>
                      <th>Pair Prize</th>
                      <th>Progress</th>
                      <th style="width: 40px">#Players</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($games as $game )
                        <tr>
                            <td><span class="badge bg-danger">{{substr($game->result_time,10)}}</span></td>
                            <td><a href="{{url('game')}}/{{$game->id}}">{{$game->name}}</a></td>
                            <td>{{$game->tag_line}}</td>
                            <td>{{$game->l_num_prize}}</td>
                            <td>{{$game->r_num_prize}}</td>
                            <td>{{$game->p_num_prize}}</td>
                            <td>
                                <div class="progress progress-xs">
                                <div class="progress-bar bg-success" style="width: {{$game->totalusers}}%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-warning">{{$game->totalusers}}</span></td>
                            <td>
                              <a href="{{url('game')}}/{{$game->id}}" class="btn btn-sm ">
                                <i class="fa fa-edit"></i>
                              </a>
                            </td>
                        </tr>
                    
                    @endforeach
                  </tbody>
                </table>
              
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
