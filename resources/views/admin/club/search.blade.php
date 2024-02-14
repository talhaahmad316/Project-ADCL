@extends('admin.main-layout')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div style= "background-color: white;" class="col-sm-12">
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
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Club Name</th>
                                <th>Club Country</th>
                                <th>Personal Club</th>
                                <th>Description</th>
                                <th>Actions</th> <!-- New column for actions -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($clubs as $club)
                                <tr>
                                    <td>{{ $club->club_name }}</td>
                                    <td>{{ $club->club_countary }}</td>
                                    <td>{{ $club->personal_club }}</td>
                                    <td>{{ $club->description }}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="{{ route('club-edit', $club->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Delete Button -->
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal{{ $club->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <!-- Delete Confirmation Modal -->
                                        <div class="modal fade" id="confirmDeleteModal{{ $club->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel{{ $club->id }}" aria-hidden="true">
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
                                    <td colspan="5">No clubs found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        @else
            <p>You don't have permission to view this page.</p>
        @endif

    </div>
@endsection
