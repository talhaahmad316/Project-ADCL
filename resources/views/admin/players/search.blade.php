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

        <div class="mb-4 row">
            {{-- <div class="col-md-6">
                <form action="{{ route('players.search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                            placeholder="Search by name or nationality">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit"
                                style="font-family: oswald; font-size:18px;">Search</button>
                            <button class="btn btn-primary" type="reset" style="font-family: oswald;  font-size:18px;">
                                <a href="{{ route('players.search') }}" style="color: white;"> Reset
                                </a>
                            </button>
                        </div>
                    </div>
                </form>
            </div> --}}
            <div class="col-md-6 " style="font-family: oswald; margin-left: 93%; font-size:18px;">
                <a href="{{ route('players.create') }}" style="margin-top: 3%;" class="btn btn-success">Add Player</a>
            </div>
        </div>
        <table id="playersTable" class="table table-bordered" style="font-family: oswald; font-size:18px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Picture</th>
                    <th>Full Name</th>
                    <th>Nationality</th>
                    <th>Player Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($players as $player)
                    <tr>
                        <td>{{ $player->id }}</td>
                        <td>
                            @if ($player->picture)
                                <img src="{{ asset('/storage/' . $player->picture) }}" alt="{{ $player->name }}"
                                    class="border rounded-circle border-light img-centered"
                                    style="width: 100px; height: 100px; object-fit: cover; object-position: center;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $player->name }}</td>
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Add pagination links below the table -->
        {{-- <div class="mt-4 d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item{{ $players->currentPage() === 1 ? ' disabled' : '' }}">
                    <a class="page-link" href="{{ $players->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                @for ($i = 1; $i <= $players->lastPage(); $i++)
                    <li class="page-item{{ $i === $players->currentPage() ? ' active' : '' }}">
                        <a class="page-link" href="{{ $players->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                <li class="page-item{{ $players->currentPage() === $players->lastPage() ? ' disabled' : '' }}">
                    <a class="page-link" href="{{ $players->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </div> --}}
    </div>
    <script>
        $(document).ready(function () {
            $('#playersTable').DataTable();
        });
    </script>
@endsection
