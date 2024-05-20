@extends('admin.main-layout')
@section('body')
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row" style="height: 45px; width: 102%; margin-left: -18px;">
                <div class="col-sm-12" style="background-color: white; padding: 6px;">
                    <h1 class="m-0">Search Match</h1>
                    {{-- <p>Search players like never before, from iconic athletes to rising gaming stars.</p> --}}
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
            <a href="{{ route('admin.matches.create') }}" style="margin-top: 4%;margin-left: -189%"
                class="btn btn-success">Add Match</a>
        </div>
    </div>
    <table id="playersTable" class="table table-bordered" style="font-family: oswald; font-size:18px;">
        <thead>
            <tr>
                <th>Match No</th>
                <th>Match Name</th>
                <th>Home Team</th>
                <th>Away Team</th>
                <th>Formate</th>
                <th>Date</th>
                <th>Tournament</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matches as $match)
                <tr>
                    <td>{{ $match->matchNo }}</td>
                    <td>{{ $match->matchName }}</td>
                    <td>{{ $match->home_team }}</td>
                    <td>{{ $match->away_team }}</td>
                    <td>{{ $match->format }}</td>
                    <td>{{ $match->matchDate }}</td>
                    <td>{{ $match->tournament->tournamentname }}</td>
                    <td>
                        {{-- Add acore --}}
                        <a href="" class="btn btn-success">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21 2.984L18.672 5.313 14.687 1.328 17.016 0 21 2.984zM12.305 3.094L3 12.391V15h2.609l9.297-9.305L12.305 3.094zM3.375 19.406L4.5 20.53 2.828 22.203c-.156.156-.375.188-.578.078-.234-.047-.375-.266-.328-.5l.891-2.031zM14.016 11.672L5.718 19.969h-2.63v-2.625L11.391 9.047l2.625 2.625z"
                                    fill="currentColor" />
                            </svg>
                        </a>
                        {{-- To view --}}
                        <a href="{{ route('admin.matches.view', $match->id) }}" class="btn btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                        {{-- To edit --}}
                        <a href="{{ route('admin.matches.edit', $match->id) }}" class="btn btn-info">
                            <i class="fas fa-edit"></i>
                        </a>
                        {{-- To delete --}}
                        <a>
                            <form action="{{ route('admin.matches.destroy', $match->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this player?')">
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
        $(document).ready(function() {
            $('#playersTable').DataTable();
        });
    </script>
@endsection
