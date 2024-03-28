    @extends('admin.main-layout')

    @section('body')
        <div class="container-fluid"
            style="margin-left: -20px; width:103%; font-family: oswald; font-size:18px; background-color:white;">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="font-size: 28px; font-weight:bold">Add Tournament</div>

                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('admin.tournaments.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tournamentname">Tournament Name:</label>
                                            <input type="text" name="tournamentname" class="form-control">
                                            @if ($errors->has('tournamentname'))
                                                <strong class="text-danger">{{ $errors->first('tournamentname') }}</strong>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tournamentLocation">Tournament Location (Google Map):</label>
                                            <input type="text" class="form-control" id="tournamentLocation"
                                                name="tournamentLocation">
                                            @if ($errors->has('tournamentLocation'))
                                                <strong
                                                    class="text-danger">{{ $errors->first('tournamentLocation') }}</strong>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tournamentCountry">Tournament Country:</label>
                                            <select class="form-control" id="tournamentCountry" name="tournamentCountry">
                                                <option value="">Select Country</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                            </select>
                                            @if ($errors->has('tournamentCountry'))
                                                <strong
                                                    class="text-danger">{{ $errors->first('tournamentCountry') }}</strong>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tournamentStartTime">Tournament Start Date:</label>
                                            <input type="date" class="form-control" id="tournamentStartTime"
                                                name="tournamentStartTime">
                                            @if ($errors->has('tournamentStartTime'))
                                                <strong
                                                    class="text-danger">{{ $errors->first('tournamentStartTime') }}</strong>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tournamentEndTime">Tournament End Date:</label>
                                            <input type="date" class="form-control" id="tournamentEndTime"
                                                name="tournamentEndTime">
                                            @if ($errors->has('tournamentEndTime'))
                                                <strong
                                                    class="text-danger">{{ $errors->first('tournamentEndTime') }}</strong>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tournamentStatus">Tournament Status:</label>
                                            <select class="form-control" id="tournamentStatus" name="tournamentStatus">
                                                <option value="">Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                            @if ($errors->has('tournamentStatus'))
                                                <strong
                                                    class="text-danger">{{ $errors->first('tournamentStatus') }}</strong>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="banner_image">Tournament Banner:</label>
                                        <input type="file" name="banner_image" accept="image/*"
                                            class="form-control-file">
                                        <div class="banner_image-preview"
                                            style="display: flex; align-items: center; margin-left: 350px; margin-top:-45px;">
                                            <img id="banner_imagePreview" src="#" alt="Logo Preview"
                                                style="max-height: 300px; display: none;">
                                        </div>
                                    </div>
                                </div><br>
                                @if ($errors->has('banner_image'))
                                    <strong class="text-danger">{{ $errors->first('banner_image') }}</strong>
                                @endif
                                <br><br><br><br><br>

                                <div style="margin-left: 90%">
                                    <button id="addTournamentButton" type="submit" class="btn btn-success">Add
                                        Tournament</button>
                                </div>


                        </div>


                        </form>
                        &nbsp;<br><br>
                    </div>
                </div>
            </div>
        </div>
        </div>



        <script>
            // JavaScript to preview the selected logo image
            document.querySelector('input[name="banner_image"]').addEventListener('change', function(e) {
                var logoPreview = document.getElementById('banner_imagePreview');
                if (e.target.files.length > 0) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        logoPreview.style.display = 'block';
                        logoPreview.src = e.target.result;
                    }
                    reader.readAsDataURL(e.target.files[0]);
                } else {
                    logoPreview.style.display = 'none';
                    logoPreview.src = '';
                }
            });
        </script>
    @endsection
