@extends('backend.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

              

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <!-- bet count -->
      <div class="row">
        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
          <div class="row">
          @foreach($stats as $key=>$stat )
         
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="info-box-text text-center text-muted">Max bid on {{$key}} number</span>
                  <span class="info-box-number text-center text-muted mb-0">
                  <b class="text-info">{{ $stat->num ?? '0' }}</b> - <b class="text-danger">[{{ $stat->total ?? '0' }}]</b></span>
                </div>
              </div>
            </div>
            @endforeach
            </div>
          </div>
        </div>
    <!-- End of bet count -->
        <div class="row">
        
          <div class="col-md-8">
            <!-- general form elements -->
            
            <div class="card card-primary">
            
              <div class="card-header">
                <h3 class="card-title">{{$game->name}}</h3>
                <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                  <a class="btn btn-dark float-right" href="{{url('game/add')}}" role="button">Declare Result</a>
                  </ul>
                </div>
              </div>
              <table class="table">
                  <thead>
                    <tr>
                      <th>Mobile</th>
                      <th># L Num</th>
                      <th># R Num</th>
                      <th>Pair Num</th>
                      <th>Bet amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($game->users as $user )
                        <tr>
                            <td>{{$user->user->mobile}}</td>
                            <td>{{ $user->l_num ?? 'NA' }}</td>
                            <td>{{ $user->r_num ?? 'NA' }}</td>
                            <td>{{ $user->pair_num ?? 'NA' }}</td>
                            
                            <td><span class="badge bg-warning">{{$user->bet_amount}}</span></td>
                        </tr>
                    
                    @endforeach
                  </tbody>
                </table>
              
            </div>
            <!-- /.card -->

            

          </div>

            <!-- Right side table -->
            <!-- <div class="col-md-4">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{$game->name}}</h3>
                </div>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Number</th>
                      <th>Bid count</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($game->users as $user )
                        <tr>
                            <td>{{$user->user->mobile}}</td>
                            <td>{{ $user->l_num ?? 'NA' }}</td>
                        </tr>
                    
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div> -->
            <!-- End of the right side table -->
        </div><!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </div>
  </div>
@stop
