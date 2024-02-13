@extends('admin.main-layout')

@section('body')
<div class="container-fluid" style="font-family: oswald; font-size: 18px; background-color: white; width: 102%; margin-left: -13px;">
    <br>
    <h2><b>Tournament Details</b></h2><br>
    <div class="row">
        <!-- Banner Image -->
        <div class="text-center col-md-12">
            @if($tournament->banner_image)
            <img src="{{ asset('storage/' . $tournament->banner_image) }}" alt="Tournament Banner" style="max-height: 300px;">
            @else
            No Banner Image
            @endif
        </div>
    </div>
    <!-- Tournament Details Row -->
    <div class="row">
        <div class="col-md-4">
            <!-- Column 1 -->
            <div class="form-group">
                <label for="tournamentname">Tournament Name:</label>
                <input type="text" name="tournamentname" class="form-control" value="{{ $tournament->tournamentname }}" readonly>
            </div>
            <div class="form-group">
                <label for="tournamentLocation">Tournament Location:</label>
                <input type="text" name="tournamentLocation" class="form-control" value="{{ $tournament->tournamentLocation }}" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Column 2 -->
            <div class="form-group">
                <label for="tournamentCountry">Tournament Country:</label>
                <input type="text" name="tournamentCountry" class="form-control" value="{{ $tournament->tournamentCountry }}" readonly>
            </div>
            <div class="form-group">
                <label for="tournamentStatus">Tournament Status:</label>
                <input type="text" name="tournamentStatus" class="form-control" value="{{ ucfirst($tournament->tournamentStatus) }}" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <!-- Column 3 -->
            <div class="form-group">
                <label for="tournamentStartTime">Tournament Start Date:</label>
                <input type="text" name="tournamentStartTime" class="form-control" value="{{ $tournament->tournamentStartTime }}" readonly>
            </div>
            <div class="form-group">
                <label for="tournamentEndTime">Tournament End Date:</label>
                <input type="text" name="tournamentEndTime" class="form-control" value="{{ $tournament->tournamentEndTime }}" readonly>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br>
</div>

@endsection
