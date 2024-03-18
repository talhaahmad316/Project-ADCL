@extends('admin.main-layout')

@section('content-header')
    <style>
        .welcome {
            font-size: 24px;
            color: #333;
            font-weight: bold;
            padding: 10px;
        }

        .breadcrumb-row {
            height: 45px;
            width: 102%;
            background-color: white;
            margin-left: -24px;
            display: flex;
            justify-content: space-between;
        }

        .breadcrumb-col {
            margin-top: 6px;
        }

        .logout-link {
            margin-top: 6px;
        }
    </style>

    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row breadcrumb-row">
                <div class="col-sm-3 ">
                    <h1 style="padding-left: 9px;" class="m-0">Dashboard</h1>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active "><a href="{{ route('logout') }}">Logout</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('body')
    <div style="height: 100%; width: 102%; background-color: white; margin-left: -13px; margin-top: -16px;">
        <div class="welcome">Welcome To UCL Admin Dashboard</div>
        <p style="padding-left: 10px">UCL is not just a cricket club, UCL is a society, a band of cricket-loving
            brothers who are amateur cricketers & yet rubbing shoulders with the top sides around.</p>
    </div>
@endsection
