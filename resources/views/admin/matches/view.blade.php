@extends('admin.main-layout')
@section('body')
    <div class="container-fluid"
        style="font-family: oswald; font-size:18px; background-color:white; width:102%; margin-left:-13px;"><br>
        <h2><b> Match Details</b></h2><br>
        <div class="row">
            <!-- Image Row -->
            <div class="col-md-2">
                <div class="text-center form-group" style="display: flex;">
                    <label for="Picture">Picture:</label>
                    @if ($match->image)
                        <img src="{{ asset('matches/' . $match->image) }}" alt="{{ $match->image }}"
                            style="max-height: 100px; border-radius:50%;">
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
                    <label for="name">Match Name:</label>
                    <input type="text" name="matchName" class="form-control" value="{{ $match->matchName }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Match No:</label>
                    <input type="text" name="matchNo" class="form-control" value="{{ $match->matchNo }}" readonly>
                </div>

                <div class="form-group">
                    <label for="nationality">Date:</label>
                    <input type="text" name="matchDate" class="form-control" value="{{ $match->matchDate }}" readonly>
                </div>


            </div>
            <div class="col-md-4">
                <!-- Column 2 -->
                <div class="form-group">
                    <label for="status">Format</label>
                    <input type="text" name="formate" class="form-control" value="{{ $match->formate }}" readonly>
                </div>
                <div class="form-group">
                    <label for="gender">Week</label>
                    <input type="text" name="week" class="form-control" value="{{ $match->week }}" readonly>
                </div>
                <div class="form-group">
                    <label for="height">Start Time</label>
                    <input type="text" name="startTime" class="form-control" value="{{ $match->startTime }}" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <!-- Column 3 -->
                <div class="form-group">
                    <label for="height">Start Time</label>
                    <input type="text" name="startTime" class="form-control" value="{{ $match->startTime }}" readonly>
                </div>
                <div class="form-group">
                    <label for="height">End Time</label>
                    <input type="text" name="finishTime" class="form-control" value="{{ $match->finishTime }}" readonly>
                </div>
                <div class="form-group">
                    <label for="height">Reporting Time</label>
                    <input type="text" name="reportingTime" class="form-control" value="{{ $match->reportingTime }}"
                        readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="height">Home Team</label>
                    <input type="text" name="reportingTime" class="form-control" value="{{ $match->home_team }}"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="height">Away Team</label>
                    <input type="text" name="reportingTime" class="form-control" value="{{ $match->away_team }}"
                        readonly>
                </div>
            </div>
            {{-- <div class="col-md-8">
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" style="width: 100%;" rows="5" readonly id="textarea">{{ $player->description ?? '' }} </textarea>
                <div id="count" style="color: #2E9E42;">
                    <span id="current_count">{{ mb_strlen($player->description ?? '') }}</span>
                    <span id="maximum_count">/ 1000</span>
                </div>
            </div>
        </div> --}}


        </div>
    @endsection
