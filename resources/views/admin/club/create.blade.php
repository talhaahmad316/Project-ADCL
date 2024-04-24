@extends('admin.main-layout')
@section('body')
    <div class="container-fluid"
        style="margin-left: -5px; width:102%; font-family: oswald; font-size:18px; background-color:white;">
        <h2>Add Club</h2>
        @if (session('success'))
            <script>
                // Display Toastr success message
                toastr.success('{{ session('success') }}');
            </script>
        @endif
        <form action="{{ route('club-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Club Name:</label>
                        <input type="text" name="club_name" class="form-control">
                        @if ($errors->has('club_name'))
                            <p class="text-danger">{{ $errors->first('club_name') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="parent_club">Select Parent Club:</label>
                        <div class="form-group">
                            <select class="form-control" name="parent_club">
                                <option value="" selected disabled>Select Parent Club</option>
                                @foreach ($clubs as $id => $clubName)
                                    <option value="{{ $id }}">{{ $clubName }}</option>
                                @endforeach
                                <option value="None">None</option>
                            </select>
                            @if ($errors->has('club_name'))
                                <p class="text-danger">{{ $errors->first('club_name') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="country">Select Country:</label>
                        <select name="country" class="form-control">
                            <option value="" selected disabled>Select Country</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                        </select>
                        @if ($errors->has('country'))
                            <p class="text-danger">{{ $errors->first('country') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
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
            <div class="col-md-4">
                <div class="form-group">
                    <label for="club_logo">Select club Logo:</label>
                    <input type="file" name="club_logo" accept="image/*" class="form-control-file"  onchange="previewImage(event)">
                    <div class="form-group" id="imagePreviewContainer" style="display: none;">
                        <img id="imagePreview" alt="Image Preview" class="rounded-circle"
                            style="max-height: 100px; margin-top: 1%;">
                    </div>
                    @if ($errors->has('club_logo'))
                        <p class="text-danger">{{ $errors->first('club_logo') }}</p>
                    @endif
                </div>
            </div>
    </div>
    <!-- Submit Button -->
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary" style="margin-top: 1%;">Add Club</button>
        </div><br>
    </div>
    </form>
    <div>
        {{-- Add myclub --}}
        {{-- @if (auth()->check() && auth()->user()->role == 1)
    <form action="{{ route('my-club.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="my_club">Add Club:</label>
                    <input type="text" name="my_club" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="mt-3 row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Add Club</button>
            </div>
        </div>
    </form>
@endif --}}

    </div>
    <script type="text/javascript">
        function previewImage(event) {
            var image = document.getElementById('imagePreview');
            var imageContainer = document.getElementById('imagePreviewContainer');
            var input = event.target;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    image.src = e.target.result;
                    imageContainer.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#textarea').keyup(function() {
            var characterCount = $(this).val().length,
                current_count = $('#current_count'),
                maximum_count = $('#maximum_count'),
                count = $('#count');
            current_count.text(characterCount);
        });
    </script>
<script @endsection
