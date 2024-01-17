@extends('admin.main-layout')
@section('content-header')
<style>
    .welcome{
        font-size: 24px;
            color: #333;
            font-weight: bold;
            padding: 10px;

    }
    </style>
<div class="content-header">
  <div class="container-fluid">
    <div class="mb-2 row" style="height:45px; width:102%; background-color: white; margin-left:-18px; ">
      <div class="col-sm-6" style="margin-top: 6px;">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection
@section('body')
<div style="height: 100%; width:102%; background-color: white; margin-left:-13px; margin-top:-16px;">
<div class="welcome">Welcome To ADCL Admin Dashboard</div>
<p style="padding-left: 10px">ADCL is a not just a cricket club, ADCL is a society,
    a band of cricket loving brothers who are Amateur cricketers
     & yet rubbing shoulders with the top sides around.</p>
</div>
@endsection



