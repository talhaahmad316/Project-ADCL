@extends('admin.main-layout')
@section('body')
    <div class="container-fluid"
        style="margin-left: -5px; width:102%; font-family: oswald; font-size:18px; background-color:white;">
        <h2>Add Club</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('club-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Club Name:</label>
                        <input type="text" name="club_name" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="club_countary">Select Countary Club:</label>
                        <div class="form-group">
                            <select class="form-control" name="club_countary">
                                <option value="">Select Countary Club</option>
                                <option value="United Club Limited">United Club Limited</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="playing_role">Select Personal Club:</label>
                        <select name="personal_club" class="form-control" required>
                            <option value="">Select Countary Club</option>
                            <option value="ADCL">ADCL</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" class="form-control" style="width: 100%;" rows="5" id="textarea" autofocus required></textarea>
                    <div id="count" style="color: #2E9E42;">
                        <span id="current_count">0</span>
                        <span id="maximum_count">/ 1000</span>
                    </div>
                </div>
            </div>
    </div>
    <!-- Submit Button -->
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary" style="margin-left: 90%;">Add Club</button>
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
