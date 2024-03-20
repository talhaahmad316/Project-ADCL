@extends('admin.main-layout')
@section('body')
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row" style="height: 45px; width: 102%; margin-left: -18px;">
                    <div class="col-sm-12" style="background-color: white; padding: 6px;">
                        <h1 class="m-0">Search Players</h1>
                        <p>Search players like never before, from iconic athletes to rising gaming stars.</p>
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
            <div class="col-md-6 " style="font-family: oswald; margin-left: 93%; font-size:18px;">
                <a href="{{ route('players.create') }}" style="margin-top: 4%;margin-left: -189%" class="btn btn-success">Add Player</a>
            </div>
        </div>
        <table id="playersTable" class="table table-bordered" style="font-family: oswald; font-size:18px;">
            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Club Name</th>
                    <th>Nationality</th>
                    <th>Player Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($players as $player)
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

                        <td>{{ $player->name }}</td>
                        <td>{{ $player->email }}</td>
                        <td>{{ $player->club_name }}</td>
                        <td>{{ $player->nationality }}</td>

                        <td><span class="badge {{ $player->status === 'active' ? 'badge-success' : 'badge-danger' }}">
                                {{ $player->status === 'active' ? 'Active' : 'Inactive' }}
                            </span></td>

                        <td>

                            <a href="{{ route('players.view', ['player' => $player->id]) }}" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('players.edit', ['player' => $player->id]) }}" class="btn btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                           
                            <a>
                                <form action="{{ route('players.delete', ['player' => $player->id]) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
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
    <script>
        $(document).ready(function () {
            $('#playersTable').DataTable();
        });
    </script>
@endsection
