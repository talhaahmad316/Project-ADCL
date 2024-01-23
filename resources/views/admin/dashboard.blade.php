@extends('admin.main-layout')
@section('content-header')
<style>
    .welcome {
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
                    <li class="breadcrumb-item active"><a href="{{ route('logout') }}">Logout</a></li>
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
    <p style="padding-left: 10px">ADCL is not just a cricket club; ADCL is a society, a band of cricket-loving
        brothers who are amateur cricketers & yet rubbing shoulders with the top sides around.</p>
</div>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    @if(auth()->check() && auth()->user()->role == 1)
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created_at</th>
        </tr>
    </thead>
    <tbody>
        @if ($users->isNotEmpty())
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name ?? '' }}</td>
                    <td>{{ $user->email ?? '' }}</td>
                    <td>{{ $user->role ?? '' }}</td>
                    <td>{{ $user->created_at ?? '' }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
    @endif
</table>
@endsection

