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
                <th>Scorecard</th>
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
                       
                        {{-- To view --}}
                        <a href="{{ route('admin.matches.view', $match->id) }}" class="btn btn-primary" title="View Match">
                            <i class="fas fa-eye"></i>
                        </a>
                        {{-- To edit --}}
                        <a href="{{ route('admin.matches.edit', $match->id) }}" class="btn btn-info" title="Edit Match">
                            <i class="fas fa-edit"></i>
                        </a>
                        {{-- To delete --}}
                        <a>
                            <form action="{{ route('admin.matches.destroy', $match->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this player?')" title="Delete Match">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </a>

                    </td>
                    <td>
                     {{-- Add score --}}
                     <a href="{{ route('matchScorecard.create',$match->id) }}" class="btn btn-success" title="Create Scorecard">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 2.984L18.672 5.313 14.687 1.328 17.016 0 21 2.984zM12.305 3.094L3 12.391V15h2.609l9.297-9.305L12.305 3.094zM3.375 19.406L4.5 20.53 2.828 22.203c-.156.156-.375.188-.578.078-.234-.047-.375-.266-.328-.5l.891-2.031zM14.016 11.672L5.718 19.969h-2.63v-2.625L11.391 9.047l2.625 2.625z" fill="currentColor" />
                        </svg>
                    </a>
                    {{-- Add Bowlling scorecard --}}
                    <a href="{{ route('matchBowllingScorecard.create',$match->id) }}" class="btn btn-primary" title="Create Bowlling Scorecard">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M18.813 7.08c-.376-.376-.96-.395-1.32-.036l-1.115 1.114a5.041 5.041 0 0 1-4.292-2.073 5.034 5.034 0 0 1-.312-7.057L10.61 1.343A7.045 7.045 0 0 0 4.354 4.656a7.037 7.037 0 0 0 5.46 11.39l-.013.006 3.137-3.138c.51-.51.51-1.339 0-1.849a1.315 1.315 0 0 0-1.856 0l-3.138 3.138a4.033 4.033 0 0 1-.083-5.746 4.028 4.028 0 0 1 3.382-1.39c1.002 0 1.93.403 2.616 1.088l1.124-1.125a1.846 1.846 0 0 1 2.653 0c.732.73.752 1.902.042 2.61z" fill="currentColor"/>
                        </svg>
                    </a>
                    
                    {{-- View score --}}
                    <a href="{{ route('matchScorecard.display',$match->id) }}" class="btn btn-info" title="View Scorecard">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 2.984L18.672 5.313 14.687 1.328 17.016 0 21 2.984zM12.305 3.094L3 12.391V15h2.609l9.297-9.305L12.305 3.094zM3.375 19.406L4.5 20.53 2.828 22.203c-.156.156-.375.188-.578.078-.234-.047-.375-.266-.328-.5l.891-2.031zM14.016 11.672L5.718 19.969h-2.63v-2.625L11.391 9.047l2.625 2.625z" fill="currentColor" />
                            <rect x="1" y="5" width="22" height="14" rx="2" fill="#fff" />
                            <line x1="1" y1="8" x2="23" y2="8" stroke="#BDBDBD" stroke-width="2" />
                            <line x1="1" y1="12" x2="23" y2="12" stroke="#BDBDBD" stroke-width="2" />
                            <line x1="1" y1="16" x2="23" y2="16" stroke="#BDBDBD" stroke-width="2" />
                        </svg>
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
