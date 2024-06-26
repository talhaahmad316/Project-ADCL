@extends('admin.main-layout')
@section('body')
    <div class="container-fluid"
        style="margin-left: -5px; width:102%; font-family: oswald; font-size:18px; background-color:white;">
        <h2>Edit Club</h2>
        @if (session('success'))
            <script>
                // Display Toastr success message
                toastr.success('{{ session('success') }}');
            </script>
        @endif
        <form action="{{ route('club-update', $club->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Club Name:</label>
                        <input type="text" name="club_name" value="{{ $club->club_name ?? '' }}" class="form-control">
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
                                @foreach ($clubs as $clubId => $clubName)
                                    <option value="{{ $clubId }}" @if (old('parent_club', $club->parent_club) == $clubId) selected @endif>
                                        {{ $clubName }}
                                    </option>
                                @endforeach
                                <option value="None" @if (old('parent_club') == 'None') selected @endif>None</option>
                            </select>
                            @if ($errors->has('parent_club'))
                                <p class="text-danger">{{ $errors->first('parent_club') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="country">Select Country:</label>
                        <select name="country" class="form-control" required>
                            <option value="" selected disabled>Select Country</option>
                            <option value="United Arab Emirates" @if ($club->country == 'United Arab Emirates') selected @endif>United
                                Arab Emirates</option>
                            <!-- Add other country options as needed -->
                        </select>
                        @if ($errors->has('country'))
                            <p class="text-danger">{{ $errors->first('country') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control" style="width: 100%;" rows="5" id="textarea">{{ $club->description ?? '' }}</textarea>
                        <div id="count" style="color: #2E9E42;">
                            <span id="current_count">{{ mb_strlen($club->description ?? '') }}</span>
                            <span id="maximum_count">/ 1000</span>
                        </div>
                        @if ($errors->has('description'))
                            <p class="text-danger">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row" style="margin-left: 0%; padding-top: 1%;">
                <label for="club_logo" style="margin-top: -27%"> Select club Logo:</label>
                @if ($club->club_logo)
                    <img src="{{ asset($club->club_logo) }}" alt="Club Logo"
                        class="border rounded-circle border-light img-centered;"
                        style="width: 100px; height: 100px; object-fit: cover; object-position: center; margin-left: -7%;">
                @else
                    No Image
                @endif
                <input type="file" name="club_logo" accept="image/*" class="mt-2 form-control-file">
                @if ($errors->has('club_logo'))
                    <p class="text-danger">{{ $errors->first('club_logo') }}</p>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" style="margin-top: 1%;">Update Club</button>
                </div><br>
            </div>
        </form>
        <br>
    </div>
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
