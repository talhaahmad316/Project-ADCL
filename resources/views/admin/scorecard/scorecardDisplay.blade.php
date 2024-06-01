@extends('admin.main-layout')

@section('body')
    <div class="container-fluid"
        style="margin-left: -20px; width:102.6%; font-family: oswald; font-size:18px; background-color:white;">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="font-size: 28px; font-weight:bold;">
                        Scorecard
                    </div>
                    <div class="col-md-6 " style="font-family: oswald; margin-left: 93%; font-size:18px;">
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            Display Scores for Match {{ $match->id }}
                                        </div>
                                        <div class="card-body">
                                            <h3 class="text-info">{{ $match->home_team }}</h3>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Player</th>
                                                        <th>Runs</th>
                                                        <th>Balls Faced</th>
                                                        <th>Fours</th>
                                                        <th>Sixes</th>
                                                        <th>How Out</th>
                                                        <th>Strike Rate</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $totalRunsHome = 0;
                                                        $totalFoursHome = 0;
                                                        $totalSixesHome = 0;
                                                    @endphp
                                                    @foreach ($homeTeamScores as $score)
                                                        <tr>
                                                            <td>{{ $score->player->name }}</td>
                                                            <td>{{ $score->runs }}</td>
                                                            <td>{{ $score->balls_faced }}</td>
                                                            <td>{{ $score->fours }}</td>
                                                            <td>{{ $score->sixes }}</td>
                                                            <td>{{ $score->how_they_got_out }}</td>
                                                            <td>
                                                                @php
                                                                    $strike_rate=number_format(($score->runs / $score->balls_faced)*100, 2);
                                                                @endphp
                                                                {{ $strike_rate }}
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $totalRunsHome += $score->runs;
                                                            $totalFoursHome += $score->fours;
                                                            $totalSixesHome += $score->sixes;
                                                        @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <p style="display: inline-block; margin-right: 10px;">Total Runs:
                                                {{ $totalRunsHome }}</p>
                                            <p style="display: inline-block; margin-right: 10px;">Total Fours:
                                                {{ $totalFoursHome }}</p>
                                            <p style="display: inline-block; margin-right: 10px;">Total Sixes:
                                                {{ $totalSixesHome }}</p>
                                            <h3 class="text-info">{{ $match->away_team }}</h3>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Player</th>
                                                        <th>Runs</th>
                                                        <th>Balls Faced</th>
                                                        <th>Fours</th>
                                                        <th>Sixes</th>
                                                        <th>How Out</th>
                                                        <th>Strike Rate</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $totalRunsAway = 0;
                                                        $totalFoursAway = 0;
                                                        $totalSixesAway = 0;
                                                    @endphp
                                                    @foreach ($awayTeamScores as $score)
                                                        <tr>
                                                            <td>{{ $score->player->name }}</td>
                                                            <td>{{ $score->runs }}</td>
                                                            <td>{{ $score->balls_faced }}</td>
                                                            <td>{{ $score->fours }}</td>
                                                            <td>{{ $score->sixes }}</td>
                                                            <td>{{ $score->how_they_got_out }}</td>
                                                            <td>
                                                                @php
                                                                    $strike_rate=number_format(($score->runs / $score->balls_faced)*100, 2);
                                                                @endphp
                                                                {{ $strike_rate }}
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $totalRunsAway += $score->runs;
                                                            $totalFoursAway += $score->fours;
                                                            $totalSixesAway += $score->sixes;
                                                        @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <p style="display: inline-block; margin-right: 10px;">Total Runs:
                                                {{ $totalRunsAway }}</p>
                                            <p style="display: inline-block; margin-right: 10px;">Total Fours:
                                                {{ $totalFoursAway }}</p>
                                            <p style="display: inline-block;">Total Sixes: {{ $totalSixesAway }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
