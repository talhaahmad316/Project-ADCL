@extends('admin.main-layout')

@section('body')
    <style>
        .team-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .team-logo img {
            max-height: 100px;
            border-radius: 50%;
            margin-right: 15px;
        }
        /* Styling for the players list */
        .player-item {
            display: inline-block;
            margin-right: 10px;
            margin-bottom: 10px;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #f0f0f0;
        }
    </style>

    <div class="container-fluid" style="margin-left: -20px; width:103.2%; ">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card team-details">
                    <div class="card-header"><b style="font-family: oswald; font-size:26px;">Team Details</b></div>

                    <div class="card-body">
                        <div class="row">
                            <!-- Team Logo -->
                            <div class="col-md-3 team-logo">
                                @if ($team->logo)
                                    <span style="font-family: oswald; font-size:18px; font-weight:bold;">Team
                                        Logo</span>&nbsp;
                                    <img src="{{ asset($team->logo) }}" alt="{{ $team->name }}">
                                @else
                                    No Logo
                                @endif
                            </div>
                        </div>
                        <!-- Team Details -->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name"style="font-family: oswald; font-size:18px; font-weight:bold;">Team
                                        Name:</label>
                                    <input type="text" name="name" class="form-control" value="{{ $team->name }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label
                                        for="club"style="font-family: oswald; font-size:18px; font-weight:bold;">Select
                                        Club:</label>
                                    <input type="text" name="club" class="form-control" value="{{ $team->club }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="status"style="font-family: oswald; font-size:18px; font-weight:bold;">Team
                                        Status:</label>
                                    <input type="text" name="status" class="form-control" value="{{ $team->status }}"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="name">Club Name:</label>
                                <input type="text" name="name" class="form-control" value="{{ $team->club ?? '' }}"
                                    readonly>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label
                                    for="description"style="font-family: oswald; width: 100%; font-size:18px; font-weight:bold;">Team
                                    Description:</label>
                                <textarea name="description" class="form-control" readonly>{{ implode(' ', array_slice(explode(' ', $team->description), 0, 14)) . '...' }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="player-table">
                                    <h3>Players in the Team</h3>
                                    <table id="playersTable" class="table table-bordered" style="font-family: oswald; font-size:18px;">
                                        <thead>
                                            <tr>
                                                <th>Picture</th>
                                                <th>Full Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($team->players as $player)
                                                <tr>
                                                    <td>
                                                        @if ($player->picture)
                                                            <img src="{{ asset($player->picture) }}" alt="{{ $player->name }}"
                                                                class="border rounded-circle border-light img-centered"
                                                                style="width: 100px; height: 100px; object-fit: cover; object-position: center;">
                                                        @else
                                                            No Image
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $player->name }}
                                                    </td>
                                                    <td>
                                                        <a>
                                                            <form action="{{ route('team.player.destroy', ['team' => $team]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="player_id" value="{{ $player->id }}">
                                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this player?')">
                                                                    <i class="fas fa-trash"></i> 
                                                                </button>
                                                            </form>
                                                            
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#playersTable').DataTable();
        });
    </script>
@endsection
