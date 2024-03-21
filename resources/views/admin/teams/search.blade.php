@extends('admin.main-layout')

@section('body')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row" style="height: 45px; width: 102%; margin-left: -18px;">
            <div class="col-sm-12" style="background-color: white; padding: 6px;">
                <h1 class="m-0">Search Teams</h1>
                <p>Search Teams like never before, from iconic athletes to rising gaming stars.</p>
            </div>
        </div>
    </div>
</div>
@if (session('success'))
<script>
    // Display Toastr success message
    toastr.success('{{ session('success') }}');
</script>
@endif
<div class="mb-4 row">
    <div class="col-md-6 " style="font-family: oswald; font-size:18px;">
        <a href="{{ route('admin.teams.create') }}" style="margin-top: 3%;" class="btn btn-success">Add Team</a>
    </div>
</div>
<div class="team-list">
    <div class="table-responsive">
        <table id="teamsTable" class="table table-bordered" style="font-family: oswald; font-size:18px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Team Name</th>
                    <th>Club</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                <tr>
                    <td>{{ $team->id }}</td>
                    <td>
                        @if ($team->logo)
                        <img src="{{asset($team->logo)}}" alt="{{ $team->name }}"
                            class="border rounded-circle border-light img-centered"
                            style="width: 100px; height: 100px; object-fit: cover; object-position: center;">
                        @else
                        <div class="no-logo">No Logo</div>
                        @endif
                    </td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->club }}</td>
                    <td>
                        <span
                            class="badge {{ $team->status === 'active' ? 'badge-success' : 'badge-danger' }}">{{ $team->status === 'active' ? 'Active' : 'Inactive' }}</span>
                    </td>


                    <td>
                        <a href="{{ route('admin.teams.view', ['team' => $team->id]) }}"
                            class="btn btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.teams.edit', ['team' => $team->id]) }}"
                            class="btn btn-info">
                            <i class="fas fa-edit"></i>
                        </a>
                        <!-- Add Player button -->
                        <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#addPlayerModal{{ $team->id }}">
                            Add Player
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
      $('#teamsTable').DataTable();
    });
</script>
@endsection
