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
                    <h1 style="    padding-left: 9px;" class="m-0">Dashboard</h1>
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

    @if (session('success'))
        <script>
            $(document).ready(function () {
                toastr.success('{{ session('success') }}', 'Success', {
                    closeButton: true,
                    progressBar: true,
                    positionClass: 'toast-top-right',
                    timeOut: 3000, // 3 seconds
                });
            });
        </script>
    @endif
@endsection

@section('body')
    <div style="height: 100%; width: 102%; background-color: white; margin-left: -13px; margin-top: -16px;">
        <div class="welcome">Welcome To ADCL Admin Dashboard</div>
        <p style="padding-left: 10px">ADCL is not just a cricket club, ADCL is a society, a band of cricket-loving
            brothers who are amateur cricketers & yet rubbing shoulders with the top sides around.</p>

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            @if(auth()->check() && auth()->user()->role == 1)
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created_at</th>
                        <th>Actions</th> <!-- New column for actions -->
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name ?? '' }}</td>
                            <td>{{ $user->email ?? '' }}</td>
                            <td>{{ $user->role ?? '' }}</td>
                            <td>{{ $user->created_at ?? '' }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('user-edit', $user->id)}}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Delete Button -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal{{ $user->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade" id="confirmDeleteModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmDeleteModalLabel{{ $user->id }}">Confirm Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this user?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <a href="{{ route('user-destroy', $user->id) }}" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            @else
                <tr>
                    <td colspan="5">You don't have permission to view this page.</td>
                </tr>
            @endif
        </table>
    </div>
@endsection
