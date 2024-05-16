@extends('admin.main-layout')

@section('body')
    <div class="container-fluid"
        style="margin-left: -20px; width:102.6%; font-family: oswald; font-size:18px; background-color:white;">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="font-size: 28px; font-weight:bold;">
                        Edit Match
                    </div>
                    <div class="col-md-6 " style="font-family: oswald; margin-left: 93%; font-size:18px;">
                        <a href="{{ route('admin.matches.search') }}" style="margin-top:;margin-left: -189%"
                            class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('admin.matches.update', $match->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="matchNo">Match No</label>
                                        <input type="number" name="matchNo" class="form-control"
                                            value="{{ $match->matchNo }}">
                                        @if ($errors->has('matchNo'))
                                            <p class="text-danger">{{ $errors->first('matchNo') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="matchName">Match Name</label>
                                        <input type="text" name="matchName" class="form-control"
                                            value="{{ $match->matchName }}">
                                        @if ($errors->has('matchName'))
                                            <p class="text-danger">{{ $errors->first('matchName') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tournament_id">Tournament</label>
                                        <select name="tournament_id" id="tournament_id" class="form-control">
                                            <option selected disabled>Select Tournament</option>
                                            @foreach ($tournaments as $id => $tournamentname)
                                                <option value="{{ $id }}"
                                                    {{ $id == $selectedTournamentId ? 'selected' : '' }}>
                                                    {{ $tournamentname }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('tournament'))
                                            <p class="text-danger">{{ $errors->first('tournament') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="matchDate">Date</label>
                                        <input type="date" name="matchDate" class="form-control"
                                            value="{{ $match->matchDate }}">
                                        @if ($errors->has('matchDate'))
                                            <p class="text-danger">{{ $errors->first('matchDate') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="format">Format</label>
                                        <input type="text" name="format" class="form-control"
                                            value="{{ $match->format }}">
                                        @if ($errors->has('format'))
                                            <p class="text-danger">{{ $errors->first('format') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="week">Week</label>
                                        <input type="number" name="week" class="form-control"
                                            value="{{ $match->week }}">
                                        @if ($errors->has('week'))
                                            <p class="text-danger">{{ $errors->first('week') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="startTime">Start Time</label>
                                        <input type="time" name="startTime" class="form-control"
                                            value="{{ old('startTime', $match->startTime) }}">
                                        @if ($errors->has('startTime'))
                                            <p class="text-danger">{{ $errors->first('startTime') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="finishTime">Finish Time</label>
                                        <input type="time" name="finishTime" class="form-control"
                                            value="{{ old('finishTime', $match->finishTime) }}">
                                        @if ($errors->has('finishTime'))
                                            <p class="text-danger">{{ $errors->first('finishTime') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="reportingTime">Reporting Time</label>
                                        <input type="time" name="reportingTime" class="form-control"
                                            value="{{ old('reportingTime', $match->reportingTime) }}">
                                        @if ($errors->has('reportingTime'))
                                            <p class="text-danger">{{ $errors->first('reportingTime') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="home_team">Home Team</label>
                                        <select name="home_team" id="home_team" class="form-control">
                                            <option selected disabled>Select Home Team</option>
                                            @foreach ($allTeams as $team)
                                                <option value="{{ $team->name }}">{{ $team->name }}</option>
                                            @endforeach
                                            <option value="other">Other</option>
                                        </select>
                                        @if ($errors->has('home_team'))
                                            <p class="text-danger">{{ $errors->first('home_team') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="away_team">Away Team</label>
                                        <select name="away_team" id="away_team" class="form-control">
                                            <option selected disabled>Select Away Team</option>
                                            @foreach ($allTeams as $team)
                                                <option value="{{ $team->name }}">{{ $team->name }}</option>
                                            @endforeach
                                            <option value="other">Other</option>
                                        </select>
                                        @if ($errors->has('away_team'))
                                            <p class="text-danger">{{ $errors->first('away_team') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div id="otherHomeTeamContainer" style="display: none;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="other_home_team">Other Home Team</label>
                                        <input type="text" name="other_home_team" id="other_home_team"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div id="otherAwayTeamContainer" style="display: none;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="other_away_team">Other Away Team</label>
                                        <input type="text" name="other_away_team" id="other_away_team"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control-file" id="image">
                                    @if ($errors->has('image'))
                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                    @endif
                                    <img src="{{ asset('matches/' . $match->image) }}" alt="{{ $match->image }}"
                                        style="max-height: 100px; border-radius: 50%;">
                                </div>
                            </div>
                            <div style="margin-left: 90%;">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div><br><br><br>
            </div>
        </div>
    </div>
@endsection

<script>
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');

    imageInput.addEventListener('change', function() {
        console.log("Image input changed"); // Check if the change event is firing

        const file = this.files[0];

        if (file) {
            console.log("File selected:", file.name); // Check if the selected file is detected

            const reader = new FileReader();

            reader.addEventListener('load', function() {
                console.log("Image loaded into reader");
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';
            });

            reader.readAsDataURL(file);
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var homeTeamSelect = document.getElementById('home_team');
        var awayTeamSelect = document.getElementById('away_team');
        var otherHomeTeamContainer = document.getElementById('otherHomeTeamContainer');
        var otherAwayTeamContainer = document.getElementById('otherAwayTeamContainer');

        homeTeamSelect.addEventListener('change', function() {
            if (this.value === 'other') {
                otherHomeTeamContainer.style.display = 'block';
            } else {
                otherHomeTeamContainer.style.display = 'none';
            }
        });

        awayTeamSelect.addEventListener('change', function() {
            if (this.value === 'other') {
                otherAwayTeamContainer.style.display = 'block';
            } else {
                otherAwayTeamContainer.style.display = 'none';
            }
        });
    });
</script>
