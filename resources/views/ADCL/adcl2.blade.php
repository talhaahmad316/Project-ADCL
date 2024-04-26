@extends('layouts.main')
@section('title')
    {{ $team->name }} Players
@endsection
@section('contents')
    <style>
        .text {
            position: relative;
            text-align: center;
            color: white;
        }
        .centered {
            position: absolute;
            text-align: center;
            left: 50%;
            margin-top: -10%;
            transform: translate(-50%, -50%);
            font-size: 85px;
            font-weight: bolder;
            color: white;
            text-shadow: 10px 10px 8px rgba(0, 0, 0, 0.5);
            /* Adjust values as needed */
        }
        .pagination {
            margin-bottom: 20px;
            color: red;
        }
    </style>
    <div style="margin-top: 14%;">
        <img src="{{ asset('images/orangecms.jpg') }}" style="width: 100%; height:350px;" alt="">
        <div class="centered">{{ $team->name }}</div>
    </div><br>
    <hr>
    <h2 style="text-align: center; color: #f04414; font-size: 49px; font-weight: bolder;">{{ $team->name }} Players Pool:
        {{ $team->players->count() }}</h2>
    <hr>
    <div class="row" style="margin-left:20px;">
        @foreach ($team->players as $player)
            <div class="col-md-3 mb-4">
                <div class="team-column style-2" style="margin-bottom: 20px;">
                    <img src="{{ asset($player->picture) }}" alt="{{ $player->name }}" height="400px;" width="310px;">
                    <div class="player-name">
                        <div class="desination-2" style="background-color:#f04414; font-family:Roboto;">ADCL</div>
                        <h5 style="font-family:Roboto;">{{ $player->name }}</h5>
                        <span class="player-number"
                            style="background-color:#f04414; font-family:Roboto;">{{ $player->description }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection