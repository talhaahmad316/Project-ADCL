@extends('admin.main-layout')

@section('body')
<div class="container-fluid" style="margin-left: -20px; width:102%; font-family: roboto; font-size:18px; background-color:white;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="font-size: 28px; font-weight:bold;">
                    <div class="d-flex justify-content-between align-items-center">
                        Search Tournament
                        <a href="{{ route('admin.tournaments.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add Tournament
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <form action="{{ route('admin.tournaments.search') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="searchTerm" class="form-control" placeholder="Search by name or country">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3" style="margin-left: 24%;">
                            <!-- Sorting Form -->
                            {{-- <form action="{{ route('admin.tournaments.sort') }}" method="GET"> --}}
                                <div class="input-group">
                                    <input type="hidden" name="searchTerm" value="{{ request('searchTerm') }}">
                                    <select name="sortColumn" class="form-control">
                                        <option value="tournamentname">Name</option>
                                        <option value="tournamentStartTime">Start Date</option>
                                        <option value="tournamentEndTime">End Date</option>
                                        <!-- Add more options for other columns if needed -->
                                    </select>
                                    <select name="sortOrder" class="form-control">
                                        <option value="asc">Ascending</option>
                                        <option value="desc">Descending</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">Sort</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>

                    <div class="table-responsive">
                        <table id="tournamentTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th >Banner Image</th>
                                    <th >Tournament Name</th>
                                    <th >Start Date</th>
                                    <th >End Date</th>
                                    <th >Status</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($searchResults as $tournament)
                                <tr>
                                    <td>{{ $tournament->id }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $tournament->banner_image) }}" alt="{{ $tournament->tournamentname }}" class="rounded-circle border border-light team-logo-image" height="70px" width="70px" id="banner_image_{{ $tournament->id }}">

                                    </td>
                                    <td>{{ $tournament->tournamentname }}</td>
                                    <td>{{ $tournament->tournamentStartTime }}</td>
                                    <td>{{ $tournament->tournamentEndTime }}</td>
                                    <td>
                                        <span class="badge {{ $tournament->tournamentStatus === 'active' ? 'badge-success' : 'badge-danger' }}">
                                            {{ $tournament->tournamentStatus === 'active' ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.tournaments.view', ['tournament' => $tournament->id]) }}" class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.tournaments.edit', ['tournament' => $tournament->id]) }}" class="btn btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                       <!-- Inside your searchTournament.blade.php -->
                           <a href="#" class="btn btn-success" data-toggle="modal" data-target="#teamListModal">
                               <i class="fas fa-plus"></i> ADD Team&nbsp;<i class="fas fa-users"></i>
                            </a>

                            <!-- Modal -->
                         <div class="modal fade" id="teamListModal" tabindex="-1" role="dialog" aria-labelledby="teamListModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                             <div class="modal-content">
                           <div class="modal-header">
                <h5 class="modal-title" id="teamListModalLabel">List of Teams</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
            </div>
            <form action="{{ route('admin.tournaments.addTeams', ['tournament' => $tournament->id]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <ul>
                        @foreach ($allTeams as $team)
                            <li>
                                <label>
                                    <input type="checkbox" name="teams[]" value="{{ $team->id }}">
                                    {{ $team->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>



<a href="{{ route('admin.matches.create') }}" class="btn btn-info">
    <i class="fas fa-plus"></i> &nbsp;ADD Match &nbsp;<i class="fas fa-futbol"></i>
</a>

                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Add pagination links below the table -->
                    <div class="d-flex justify-content-center mt-4">
                        <ul class="pagination">
                            <li class="page-item{{ $searchResults->currentPage() === 1 ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $searchResults->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            @for ($i = 1; $i <= $searchResults->lastPage(); $i++)
                                <li class="page-item{{ $i === $searchResults->currentPage() ? ' active' : '' }}">
                                    <a class="page-link" href="{{ $searchResults->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <li class="page-item{{ $searchResults->currentPage() === $searchResults->lastPage() ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $searchResults->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
