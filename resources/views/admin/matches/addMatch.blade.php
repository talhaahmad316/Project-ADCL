@extends('admin.main-layout')

@section('body')
    <div class="container-fluid"
        style="margin-left: -20px; width:102.6%; font-family: oswald; font-size:18px; background-color:white;">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="font-size: 28px; font-weight:bold;">
                        ADD Match
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('admin.matches.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="matchName">Match Name</label>
                                        <input type="text" name="matchName" class="form-control">
                                        @if ($errors->has('matchName'))
                                            <p class="text-danger">{{ $errors->first('matchName') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="team">Teams</label>
                                        <select name="team_id" class="form-control">
                                            <option selected disabled>Select Team</option>
                                            @foreach ($allTeams as $team)
                                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('team_id'))
                                            <p class="text-danger">{{ $errors->first('team_id') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="matchNo">Match No</label>
                                        <input type="number" name="matchNo" class="form-control">
                                        @if ($errors->has('matchNo'))
                                            <p class="text-danger">{{ $errors->first('matchNo') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="matchDate">Date</label>
                                        <input type="date" name="matchDate" class="form-control">
                                        @if ($errors->has('matchDate'))
                                            <p class="text-danger">{{ $errors->first('matchDate') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="format">Format</label>
                                        <input type="text" name="format" class="form-control">
                                        @if ($errors->has('format'))
                                            <p class="text-danger">{{ $errors->first('format') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="week">Week</label>
                                        <input type="number" name="week" class="form-control">
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
                                        <input type="time" name="startTime" class="form-control">
                                        @if ($errors->has('startTime'))
                                            <p class="text-danger">{{ $errors->first('startTime') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="finishTime">Finish Time</label>
                                        <input type="time" name="finishTime" class="form-control">
                                        @if ($errors->has('finishTime'))
                                            <p class="text-danger">{{ $errors->first('finishTime') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="reportingTime">Reporting Time</label>
                                        <input type="time" name="reportingTime" class="form-control">
                                        @if ($errors->has('reportingTime'))
                                            <p class="text-danger">{{ $errors->first('reportingTime') }}</p>
                                        @endif
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
                                    <img id="imagePreview" src="#" alt="Image Preview"
                                        style="max-width: 100%; max-height: 200px; margin-top: 10px; display: none;">
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