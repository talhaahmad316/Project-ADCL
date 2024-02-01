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
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Player Information Columns -->
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Club Name:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nationality">Select Club:</label>
                        <div class="form-group">
                            <!-- Country names and Country Name -->
                            <select class="form-control" id="nationality" name="nationality">
                                <option value="">Select Country</option>

                                <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Additional Player Information Columns -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="height">Height:</label>
                            <input type="number" name="height" class="form-control" required>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="playing_role">Playing Role:</label>
                            <select name="playing_role" class="form-control" required>
                                <!-- Options for playing role -->
                                <option>Select player role</option>
                                <option value="batsman">Batsman</option>
                                <option value="bowler">Bowler</option>
                                <option value="all_rounder">All Rounder</option>
                                <option value="wicketkeeper_batsman">Wicketkeeper Batsman</option>
                                <option value="coach">Coach</option>
                                <option value="umpire">Umpire</option>
                                <option value="manager">Manager</option>
                                <option value="administrator">Administrator</option>
                            </select>
                        </div>
                    </div>
            </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="batting_style">Batting Style:</label>
                            <select name="batting_style" class="form-control" required>
                                <!-- Options for batting style -->
                                <option>Select batting style</option>
                                <option value="right_hand">Right Hand Bat</option>
                                <option value="left_hand">Left Hand Bat</option>
                            </select>
                        </div>
                    </div>

                 <!-- Bowling Style and Description -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="bowling_style">Bowling Style:</label>
                            <select name="bowling_style" class="form-control" required>
                                <!-- Options for bowling style -->
                                <option>Select bowling style</option>
                                <option value="right_arm_off_break">Right Arm Off Break</option>
                                <option value="right_arm_leg_break">Right Arm Leg Break</option>
                                <option value="left_arm_chinaman">Left Arm Chinaman</option>
                                <option value="slow_right_arm_orthodox">Slow Right Arm Orthodox</option>
                                <option value="slow_left_arm_orthodox">Slow Left Arm Orthodox</option>
                                <option value="right_arm_medium_fast">Right Arm Medium Fast</option>
                                <option value="right_arm_fast">Right Arm Fast</option>
                                <option value="left_arm_medium_fast">Left Arm Medium Fast</option>
                                <option value="left_arm_fast">Left Arm Fast</option>
                                <option value="left_arm_wrist_spin">Left Arm Wrist Spin</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">Player Status:</label>
                            <select name="status" class="form-control" required>
                                <!-- Options for bowling style -->
                                <option>Select status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>

                            </select>
                        </div>
                    </div>
                </div>


                <div class="col-md-8">
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control" style="width: 100%;" rows="5" id="textarea" autofocus
                            required></textarea>
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
                    <button type="submit" class="btn btn-primary" style="margin-left: 90%;">Add Player</button>
                </div><br>
            </div>
        </form>
        <br>
    </div>

    <script>
        // JavaScript to add more player fields when clicking on "Add More Player" button
        document.getElementById('addMorePlayer').addEventListener('click', function(event) {
            event.preventDefault();
            var container = document.createElement('div');
            container.innerHTML = `
        <form action="{{ route('players.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Picture">Picture:</label>
                <input type="file" name="Picture" accept="image/*" class="form-control-file" required>
            </div>

            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" name="name" class="form-control" style="width: 50px;" required>
            </div>

            <div class="form-group">
                <label for="nationality">Nationality:</label>
                <select name="nationality" class="form-control" style="width: 50%;" required>
                    <option value="country1">Country 1</option>
                    <option value="country2">Country 2</option>
                    <!-- Add more country options here -->
                </select>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" class="form-control" style="width: 50%;" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Others</option>
                </select>
            </div>

            <div class="form-group">
                <label for="height">Height:</label>
                <input type="number" name="height" class="form-control" style="width: 50%;" required>
            </div>

            <div class="form-group">
                <label for="playing_role">Playing Role:</label>
                <select name="playing_role" class="form-control" style="width: 50%;" required>
                    <option value="batsman">Batsman</option>
                    <option value="bowler">Bowler</option>
                    <option value="all_rounder">All Rounder</option>
                    <option value="wicketkeeper_batsman">Wicketkeeper Batsman</option>
                    <option value="coach">Coach</option>
                    <option value="umpire">Umpire</option>
                    <option value="manager">Manager</option>
                    <option value="administrator">Administrator</option>
                </select>
            </div>

            <div class="form-group">
                <label for="batting_style">Batting Style:</label>
                <select name="batting_style" class="form-control" style="width: 50%;" required>
                    <option value="right_hand">Right Hand Bat</option>
                    <option value="left_hand">Left Hand Bat</option>
                </select>
            </div>

            <div class="form-group">
                <label for="bowling_style">Bowling Style:</label>
                <select name="bowling_style" class="form-control" style="width: 50%;" required>
                    <option value="right_arm_off_break">Right Arm Off Break</option>
                    <option value="right_arm_leg_break">Right Arm Leg Break</option>
                    <option value="left_arm_chinaman">Left Arm Chinaman</option>
                    <option value="slow_right_arm_orthodox">Slow Right Arm Orthodox</option>
                    <option value="slow_left_arm_orthodox">Slow Left Arm Orthodox</option>
                    <option value="right_arm_medium_fast">Right Arm Medium Fast</option>
                    <option value="right_arm_fast">Right Arm Fast</option>
                    <option value="left_arm_medium_fast">Left Arm Medium Fast</option>
                    <option value="left_arm_fast">Left Arm Fast</option>
                    <option value="left_arm_wrist_spin">Left Arm Wrist Spin</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" style="width: 100%;" rows="5" maxlength="1000" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add Player</button>
        </form>`;

            document.querySelector('form').appendChild(container);
        });

        // Function to preview uploaded image
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
