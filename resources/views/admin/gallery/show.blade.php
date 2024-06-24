@extends('admin.main-layout')

@section('body')
    <div class="container-fluid"
        style="font-family: oswald; font-size: 18px; background-color: white; width: 102%; margin-left: -13px;">
        <br>
        <h2><b>Gallery</b></h2><br>
        <div class="row">
            <!-- Banner Image -->
            <div class="col-md-12">
                @if ($gallery->image)
                    <img src="{{ asset('gallery/' . $gallery->image) }}" alt="Gallery Image" style="max-height: 200px;">
                @else
                    No Banner Image
                @endif
            </div>
        </div>
        <br>
        <!-- Tournament Details Row -->
        <div class="row">
            <div class="col-md-4">
                <!-- Column 1 -->
                <div class="form-group">
                    <label for="tournamentname">Caption:</label>
                    <input type="text" name="tournamentname" class="form-control" value="{{ $gallery->caption }}"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="tournamentLocation">Alternate Text:</label>
                    <input type="text" name="tournamentLocation" class="form-control"
                        value="{{ $gallery->alternateText }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" class="form-control" style="width: 100%;" rows="5" id="textarea" autofocus readonly>{{ $gallery->description }}</textarea>
                    <div id="count" style="color: #2E9E42;">
                        <span id="current_count">0</span>
                        <span id="maximum_count">/ 1000</span>
                    </div>
                </div>
            </div>
        </div>
    <br><br><br><br><br><br><br><br><br><br><br>
    </div>
    <script>
        $(document).ready(function() {
            $('#playersTable').DataTable();
        });
    </script>
@endsection
