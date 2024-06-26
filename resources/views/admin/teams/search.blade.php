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
            toastr.success('{{ session('success') }}');
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error('{{ session('error') }}');
        </script>
    @endif

    <div class="mb-4 row">
        {{-- <div class="col-md-6">
                <form action="{{ route('admin.teams.search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search by name or club">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit"
                                style="font-family: oswald; font-size:18px;">Search</button>
                            <button class="btn btn-primary" type="reset" style="font-family: oswald;  font-size:18px;">
                                <a href="{{ route('admin.teams.search') }}" style="color: white;"> Reset
                                </a>
                            </button>

                        </div>

                    </div>
                </form>
            </div> --}}
        <div class="col-md-6 " style="font-family: oswald;
         font-size:18px;">
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
                                    <img src="{{ asset($team->logo) }}" alt="{{ $team->name }}"
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
                                <a href="{{ route('admin.teams.view', ['team' => $team->id]) }}" class="btn btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.teams.edit', ['team' => $team->id]) }}" class="btn btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('team-delete', ['id' => $team->id]) }}" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <!-- Add Player button -->
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#addPlayerModal{{ $team->id }}">
                                    Add Player
                                </button>

                                @foreach ($teams as $team)
                                    <!-- Add Player Modal -->
                                    <div class="modal fade" id="addPlayerModal{{ $team->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="addPlayerModalLabel{{ $team->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addPlayerModalLabel{{ $team->id }}">Add
                                                        Players to
                                                        <b>{{ $team->name }}</b>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('teams.addPlayers', ['team' => $team->id]) }}"
                                                        method="POST">

                                                        <!-- Add an input field for team_name here -->
                                                        @csrf
                                                        <input type="text" name="team_name" value="{{ $team->name }}"
                                                            hidden>
                                                        @php
                                                            // Sort the players collection by name in alphabetical order
                                                            $sortedPlayers = $players->sortBy('name');
                                                        @endphp
                                                        @foreach ($sortedPlayers as $player)
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="selected_players[]" value="{{ $player->id }}">
                                                                <label class="form-check-label"
                                                                    for="selected_players{{ $player->id }}">
                                                                    {{ $player->name }} ( {{ $player->club_name }} )
                                                                </label>
                                                            </div>
                                                            <hr>
                                                        @endforeach
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Add pagination links below the table -->
    {{-- <div class="mt-4 d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item{{ $teams->currentPage() === 1 ? ' disabled' : '' }}">
                    <a class="page-link" href="{{ $teams->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                @for ($i = 1; $i <= $teams->lastPage(); $i++)
                    <li class="page-item{{ $i === $teams->currentPage() ? ' active' : '' }}">
                        <a class="page-link" href="{{ $teams->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                <li class="page-item{{ $teams->currentPage() === $teams->lastPage() ? ' disabled' : '' }}">
                    <a class="page-link" href="{{ $teams->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </div> --}}
    </div>
    <script>
        $(document).ready(function() {
            $('#teamsTable').DataTable();
        });
    </script>
@endsection
