@extends('backend.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            @widget('FollowupList')
          </div>
        </div><!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </div>
  </div>
@stop
