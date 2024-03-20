@extends('admin.main-layout')
@section('body')

<div class="container-fluid" style="font-family: oswald; font-size:18px; background-color:white; width:102%; margin-left:-13px;"><br>
    <h2><b> Player Details</b></h2><br>
    <div class="row">
        <!-- Image Row -->
        <div class="col-md-2">
            <div class="text-center form-group" style="display: flex;">
                <label for="Picture">Picture:</label>
                @if($player->picture)
                <img src="{{ asset($player->picture) }}" alt="{{ $player->name }}"
                style="max-height: 100px; border-radius:50%; ">
                @else
                No Image
                @endif
            </div>
        </div>
    </div>
    <!-- Player Details Row -->
    <div class="row">
        <div class="col-md-4">
            <!-- Column 1 -->
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $player->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="name">Email:</label>
                <input type="text" name="name" class="form-control" value="{{ $player->email }}" readonly>
            </div>

            <div class="form-group">
                <label for="nationality">Nationality:</label>
                <input type="text" name="nationality" class="form-control" value="{{ $player->nationality }}" readonly>
            </div>
        
            
        </div>
        <div class="col-md-4">
            <!-- Column 2 -->
            <div class="form-group">
                <label for="status">Player status:</label>
                <input type="text" name="status" class="form-control" value="{{ $player->status }}" readonly>
            </div>
            <div class="form-group">
                <label for="gender">Player gender:</label>
                <input type="text" name="gender" class="form-control" value="{{ $player->gender }}" readonly>
            </div>
            <div class="form-group">
                <label for="height">Player height:</label>
                <input type="text" name="height" class="form-control" value="{{ $player->height }}" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <!-- Column 3 -->
            <div class="form-group">
                <label for="playing_role">Player Role:</label>
                <input type="text" name="playing_role" class="form-control" value="{{ $player->playing_role }}" readonly>
            </div>
            <div class="form-group">
                <label for="batting_style">Batting Style:</label>
                <input type="text" name="batting_style" class="form-control" value="{{ $player->batting_style }}" readonly>
            </div>
            <div class="form-group">
                <label for="bowling_style">Bowling Style:</label>
                <input type="text" name="bowling_style" class="form-control" value="{{ $player->bowling_style }}" readonly>
            </div>
        </div>


        <div class="col-md-8">
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" style="width: 100%;" rows="5" readonly id="textarea">{{ $player->description ?? '' }} </textarea>
                <div id="count" style="color: #2E9E42;">
                    <span id="current_count">{{ mb_strlen($player->description ?? '') }}</span>
                    <span id="maximum_count">/ 1000</span>
                </div>
            </div>
        </div>

    
</div>

@endsection
