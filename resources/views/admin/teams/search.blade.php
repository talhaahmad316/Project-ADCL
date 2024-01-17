    @extends('admin.main-layout')

    @section('body')
    <div class="container-fluid" style="margin-left: -20px; width:102.5%; font-family: oswald; font-size:18px; background-color:white;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"style="font-size: 28px; font-weight:bold;">
                        <div class="d-flex justify-content-between align-items-center">
                            Search Teams
                            <a href="{{ route('admin.teams.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add Team
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <form action="{{ route('admin.teams.search') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search by name or club">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="team-list">
                            <div class="table-responsive">
                                <table class="table table-bordered">
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
                                        @foreach($teams as $team)
                                        <tr>
                                            <td>{{ $team->id }}</td>
                                            <td>
                                                @if($team->logo)
                                                <img src="{{ asset('storage/' . $team->logo) }}" alt="{{ $team->name }}" class="rounded-circle border border-light team-logo-image" height="70px" width="70px">
                                                @else
                                                <div class="no-logo">No Logo</div>
                                                @endif
                                            </td>
                                            <td>{{ $team->name }}</td>
                                            <td>{{ $team->club }}</td>
                                            <td>
                                                <span class="badge {{ $team->status === 'active' ? 'badge-success' : 'badge-danger' }}">{{ $team->status === 'active' ? 'Active' : 'Inactive' }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.teams.view', ['team' => $team->id]) }}" class="btn btn-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.teams.edit', ['team' => $team->id]) }}" class="btn btn-info">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <!-- Add Player button -->
                                                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addPlayerModal{{ $team->id }}">
                                                  Add Player
                                              </button>
                                              @foreach($teams as $team)
                                           <!-- Add Player Modal -->
                                         <div class="modal fade" id="addPlayerModal{{ $team->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="addPlayerModalLabel{{ $team->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addPlayerModalLabel{{ $team->id }}">Add Players to <b>{{ $team->name }}</b></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                      <form action="{{ route('teams.addPlayers', ['team' => $team->id]) }}" method="POST">

                                        <!-- Add an input field for team_name here -->
                                                                        @csrf
                                                        <input type="text" name="team_name" value="{{ $team->name }}" hidden>
                                                        @php
                                                            // Sort the players collection by name in alphabetical order
                                                            $sortedPlayers = $players->sortBy('name');
                                                        @endphp
                                                        @foreach($sortedPlayers as $player)
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="selected_players[]" value="{{ $player->id }}">
                                                                <label class="form-check-label" for="selected_players{{ $player->id }}">
                                                                    {{ $player->name }}
                                                                </label>
                                                            </div>
                                                            <hr>
                                                        @endforeach
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    <div class="d-flex justify-content-center mt-4">
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
    </div>

    </div>

    @endsection
