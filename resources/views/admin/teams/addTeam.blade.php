@extends('admin.main-layout')

@section('body')
    <div class="container-fluid"
        style="margin-left: -20px; width:103.5%; font-family: oswald; font-size:18px; background-color:white;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="font-size: 28px; font-weight:bold">Add Team</div>
                    <div class="card-body">
                        @if (session('success'))
                            <script>
                                // Display Toastr success message
                                toastr.success('{{ session('success') }}');
                            </script>
                        @endif
                        <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Team Name:</label>
                                        <input type="text" name="name" class="form-control">
                                        @if ($errors->has('name'))
                                            <p class="text-danger">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="club">Select Club:</label>
                                    <select name="club" class="form-control">
                                        <option value="" selected disabled>Select a Club</option>
                                        @foreach ($clubs as $club)
                                            <option value="{{ $club->club_name }}">{{ $club->club_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('club'))
                                        <p class="text-danger">{{ $errors->first('club') }}</p>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <label for="status">Status:</label>
                                    <select name="status" class="form-control">
                                        <option value="" selected disabled>Select a Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <p class="text-danger">{{ $errors->first('status') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="description">Description:</label>
                                    <textarea name="description" class="form-control" style="width: 100%;" rows="5" id="textarea" autofocus></textarea>
                                    <div id="count" style="color: #2E9E42;">
                                        <span id="current_count">0</span>
                                        <span id="maximum_count">/ 1000</span>
                                    </div>
                                    @if ($errors->has('description'))
                                        <p class="text-danger">{{ $errors->first('description') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="logo">Team Logo:</label>
                                        <input type="file" name="logo" accept="image/*" class="form-control-file">
                                        <div class="logo-preview" style="display: flex; align-items: center;">
                                            <img id="logoPreview" src="#" alt="Logo Preview" class="rounded-circle"
                                                style="max-height: 100px; margin-top: 1%; display: none;">
                                        </div>
                                        @if ($errors->has('logo'))
                                            <p class="text-danger">{{ $errors->first('logo') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 1%">
                                <button type="submit" class="btn btn-primary">Add Team</button>
                            </div>
                        </form>
                        &nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to preview the selected logo image
        document.querySelector('input[name="logo"]').addEventListener('change', function(e) {
            var logoPreview = document.getElementById('logoPreview');
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
    <script type="text/javascript">
        $('#textarea').keyup(function() {
            var characterCount = $(this).val().length,
                current_count = $('#current_count'),
                maximum_count = $('#maximum_count'),
                count = $('#count');
            current_count.text(characterCount);
        });
    </script>
@endsection
