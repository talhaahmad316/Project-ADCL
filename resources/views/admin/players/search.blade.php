@extends('admin.main-layout')
@section('body')

<div class="container-fluid mt-12" style="background-color: white; width:102%; margin-left:-12px;" style="font-family: oswald; font-size:18px;"><br>
    <div style="font-family:'Times New Roman', Times, serif; font-size:18px;">
{{-- Here you can write your content --}}
    </div>
    <br>
    <h2 style="font-family: oswald; margin-top: -2%; font-size:28px; font-weight:bold;">Search Players</h2>
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('players.search') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by name or nationality">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" style="font-family: oswald; font-size:18px;">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6 " style="font-family: oswald; margin-left: 93%; font-size:18px;">
            <a href="{{ route('players.create') }}" class="btn btn-success">Add Player</a>
        </div>
    </div>

    <table class="table table-bordered" style="font-family: oswald; font-size:18px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Picture</th>
                <th>Full Name
                    <a href="{{ route('players.search', ['sort' => 'name_asc']) }}"><i class="fas fa-arrow-up"></i></a>
                    <a href="{{ route('players.search', ['sort' => 'name_desc']) }}"><i class="fas fa-arrow-down"></i></a>
                </th>
                <th>Nationality
                    <a href="{{ route('players.search', ['sort' => 'nationality_asc']) }}"><i class="fas fa-arrow-up"></i></a>
                    <a href="{{ route('players.search', ['sort' => 'nationality_desc']) }}"><i class="fas fa-arrow-down"></i></a>
                </th>
                <th>Player Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($players as $player)
            <tr>
                <td>{{ $player->id }}</td>
                <td>
                    @if($player->picture)
                    <img src="{{ asset('/storage/' . $player->picture) }}" alt="{{ $player->name }}"
                    class="rounded-circle border border-light img-centered" style="width: 100px; /* Set the desired width */
                    height: 100px; /* Set the desired height */
                    object-fit: cover;
                    object-position: center;">

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
<div class="d-flex justify-content-center mt-4">
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
</div>
<br><br><br><br><br><br>
</div>

@endsection
