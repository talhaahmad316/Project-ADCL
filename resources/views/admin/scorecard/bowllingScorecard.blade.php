@extends('admin.main-layout')

@section('body')
    <div class="container-fluid"
        style="margin-left: -20px; width:102.6%; font-family: oswald; font-size:18px; background-color:white;">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="font-size: 28px; font-weight:bold;">
                        ADD Score
                    </div>
                    <div class="col-md-6 " style="font-family: oswald; margin-left: 93%; font-size:18px;">
                        <a href="{{ route('matchScorecard.display',$match->id) }}" style="margin-top:;margin-left: -189%"
                            class="btn btn-success">Scorecard</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="match_id" value="{{ $match->id }}">
                            <h3 class="text-info bg-dark text-center">{{ $match->home_team }}</h3>
                            <br>
                            @foreach ($homeTeamPlayers as $player)
                            <input type="hidden" name="ball[home_{{ $player->id }}][player_id]" value="{{ $player->id }}">
                            <label for="player_{{ $player->id }}" class="text-secandry bg-dark p-1">{{ $player->name }}</label>
                            <input type="number" name="ball[home_{{ $player->id }}][overs]" placeholder="Overs">
                            <input type="number" name="ball[home_{{ $player->id }}][runs]" placeholder="Runs">
                            <input type="number" name="ball[home_{{ $player->id }}][wickets]" placeholder="Wickets">
                            <br>
                            @endforeach
                            <br>
                            <br>
                        
                            <h3 class="text-info bg-dark text-center">{{ $match->away_team }}</h3>
                            <br>
                            @foreach ($awayTeamPlayers as $player)
                            <input type="hidden" name="ball[away_{{ $player->id }}][player_id]" value="{{ $player->id }}">
                            <label for="player_{{ $player->id }}" class="text-secandry bg-dark p-1">{{ $player->name }}</label>
                            <input type="number" name="ball[away_{{ $player->id }}][overs]" placeholder="Overs">
                            <input type="number" name="ball[away_{{ $player->id }}][runs]" placeholder="Runs">
                            <input type="number" name="ball[away_{{ $player->id }}][wickets]" placeholder="Wickets">
                            <br>
                            @endforeach
                        
                            <div>
                                <button type="submit" class="btn btn-primary">Save</button>
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
