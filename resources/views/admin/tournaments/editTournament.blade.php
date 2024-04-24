@extends('admin.main-layout')

@section('body')
    <div class="container-fluid"
        style="font-family: oswald; font-size: 18px; background-color: white; width: 102%; margin-left: -13px;">
        <br>
        <h2><b>Edit Tournament</b></h2><br>
        <form action="{{ route('admin.tournaments.update', $tournament->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- Banner Image -->
                <div class="text-center col-md-12">
                    <label for="banner_image">Tournament Banner:</label><br>
                    @if ($tournament->banner_image)
                        <img src="{{ asset('storage/' . $tournament->banner_image) }}" alt="Tournament Banner" style="max-height: 300px;">
                    @else
                        No Banner Image
                    @endif
                    <input type="file" name="banner_image" accept="image/*" class="form-control-file">
                    @if ($errors->has('banner_image'))
                            <p class="text-danger">{{ $errors->first('banner_image') }}</p>
                        @endif
                </div>
            </div>
            <!-- Tournament Details Row -->
            <div class="row">
                <div class="col-md-4">
                    <!-- Column 1 -->
                    <div class="form-group">
                        <label for="tournamentname">Tournament Name:</label>
                        <input type="text" name="tournamentname" class="form-control" value="{{ $tournament->tournamentname }}">
                        @if ($errors->has('tournamentname'))
                            <p class="text-danger">{{ $errors->first('tournamentname') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tournamentLocation">Tournament Location:</label>
                        <input type="text" name="tournamentLocation" class="form-control" value="{{ $tournament->tournamentLocation }}">
                        @if ($errors->has('tournamentLocation'))
                            <p class="text-danger">{{ $errors->first('tournamentLocation') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Column 2 -->
                    <div class="form-group">
                        <label for="tournamentCountry">Tournament Country:</label>
                        <input type="text" name="tournamentCountry" class="form-control" value="{{ $tournament->tournamentCountry }}">
                        @if ($errors->has('tournamentCountry'))
                            <p class="text-danger">{{ $errors->first('tournamentCountry') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tournamentStatus">Tournament Status:</label>
                        <select class="form-control" id="tournamentStatus" name="tournamentStatus">
                            <option value="" selected disabled>Select Status</option>
                            <option value="active" {{ $tournament->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $tournament->status == 'inactive' ? 'selected' : '' }}>Inactive
                            </option>
                        </select>
                        @if ($errors->has('tournamentStatus'))
                            <p class="text-danger">{{ $errors->first('tournamentStatus') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Column 3 -->
                    <div class="form-group">
                        <label for="tournamentStartTime">Tournament Start Date:</label>
                        <input type="date" name="tournamentStartTime" class="form-control" value="{{ $tournament->tournamentStartTime }}">
                        @if ($errors->has('tournamentStartTime'))
                            <p class="text-danger">{{ $errors->first('tournamentStartTime') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tournamentEndTime">Tournament End Date:</label>
                        <input type="date" name="tournamentEndTime" class="form-control" value="{{ $tournament->tournamentEndTime }}">
                        @if ($errors->has('tournamentEndTime'))
                            <p class="text-danger">{{ $errors->first('tournamentEndTime') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Inside your Blade template -->
                <div class="form-group">
                    <label for="teams">Select Teams:</label>
                    <select class="form-control" name="teams[]" multiple
                        style="width: 100%; border-radius: 5px; border: 1px solid #ccc; padding: 5px;">
                        @foreach ($allTeams as $team)
                            <option value="{{ $team->id }}"
                                {{ in_array($team->id, $selectedTeamIds) ? 'selected' : '' }}>
                                {{ $team->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <h2><b>Edit Match</b></h2><br>
            <br><br>
            <div class="row">
                <div class="text-center col-md-12">
                    <button style="margin-left: 90%" type="submit" class="btn btn-primary">Update Tournament</button>
                </div>
            </div><br><br><br><br><br>
        </form>
    </div>
@endsection
