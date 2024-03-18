@extends('admin.main-layout')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-12" style="background-color: white;">
                    <h1>Search Club</h1>
                    <p>Search Club like never before, from iconic athletes to rising gaming stars.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-4 row">
        <div class="col-md-6">
            <!-- You can add content here if needed -->
        </div>
    </div>
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
    <div class="container-fluid">
        @if(auth()->check() && auth()->user()->role == 1)
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="clubTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th>Club Name</th>
                                    <th>Parent Club</th>
                                    <th>Country</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($clubs as $club)
                                    <tr>
                                        <td>
                                            @if ($club->club_logo)
                                                <img src="{{ asset($club->club_logo) }}" alt="Club Logo"
                                                    class="border rounded-circle border-light img-centered"
                                                    style="width: 100px; height: 100px; object-fit: cover; object-position: center;">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>{{ $club->club_name }}</td>
                                        <td>{{ $club->parent_club }}</td>
                                        <td>{{ $club->country }}</td>
                                        <td>{{ $club->description }}</td>
                                        <td>
                                            <a href="{{ route('club-edit', $club->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#confirmDeleteModal{{ $club->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <div class="modal fade" id="confirmDeleteModal{{ $club->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="confirmDeleteModalLabel{{ $club->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $club->id }}">Confirm Delete</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this club?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <a href="{{ route('club-destroy', $club->id) }}" class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No clubs found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Include jQuery and DataTables library -->
            @push('scripts')
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
                <script type="text/javascript" charset="utf8"
                    src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
                <script>
                    $(document).ready(function () {
                        $('#clubTable').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                            "responsive": true,
                        });
                    });
                </script>
            @endpush

        @else
            <p>You don't have permission to view this page.</p>
        @endif
    </div>
    <script>
        $(document).ready(function () {
            $('#clubTable').DataTable();
        });
    </script>
@endsection
