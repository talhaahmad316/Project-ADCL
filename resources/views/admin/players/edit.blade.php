@extends('admin.main-layout')
@section('body')
    <div class="container-fluid"
        style="font-family: oswald; font-size:18px; background-color:white; width:102%; margin-left:-10px; padding-left:22px;">
        <br>
        <h2 style="margin-top: -1%;"><b>Edit Player Details</b></h2>

        @if (session('success'))
            <script>
                // Display Toastr success message
                toastr.success('{{ session('success') }}');
            </script>
        @endif
        <form action="{{ route('players.update', ['id' => $player->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    <label for="name">Full Name:</label>
                    <input type="text" name="name" class="form-control" value="{{ $player->name ?? '' }}">
                    @if ($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="col-md-4">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ $player->email ?? '' }}" disabled>
                    @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nationality">Nationality:</label>
                        <select class="form-control" id="nationality" name="nationality">
                            <option value="" selected disabled>Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country }}"
                                    {{ $player->nationality == $country ? 'selected' : '' }}>{{ $country }}</option>
                                <option value="">Select Country</option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Aland Islands">Aland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Congo, Democratic Republic of the Congo">Congo, Democratic Republic of the
                                    Congo
                                </option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Curacao">Curacao</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Territories">French Southern Territories</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guernsey">Guernsey</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands
                                </option>
                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jersey">Jersey</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic
                                    of
                                </option>
                                <option value="Korea, Republic of">Korea, Republic of</option>
                                <option value="Kosovo">Kosovo</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macao">Macao</option>
                                <option value="Macedonia, the Former Yugoslav Republic of">Macedonia, the Former Yugoslav
                                    Republic of</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montenegro">Montenegro</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn">Pitcairn</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russian Federation">Russian Federation</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Barthelemy">Saint Barthelemy</option>
                                <option value="Saint Helena">Saint Helena</option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Martin">Saint Martin</option>
                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Sint Maarten">Sint Maarten</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Georgia and the South Sandwich Islands">South Georgia and the South
                                    Sandwich Islands</option>
                                <option value="South Sudan">South Sudan</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Timor-Leste">Timor-Leste</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands
                                </option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Viet Nam">Viet Nam</option>
                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                <option value="Virgin Islands, U.s.">Virgin Islands, U.s.</option>
                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                <option value="Western Sahara">Western Sahara</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            @endforeach
                        </select>
                        @if ($errors->has('nationality'))
                            <p class="text-danger">{{ $errors->first('nationality') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select name="gender" class="form-control">
                            <option selected disabled>Select gender</option>
                            <option value="male" {{ $player->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $player->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="others" {{ $player->gender == 'others' ? 'selected' : '' }}>Others</option>
                        </select>
                        @if ($errors->has('gender'))
                            <p class="text-danger">{{ $errors->first('gender') }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="height">Height:(e.g. 5ft 8inches)</label>
                        <input type="text" name="height" value="{{ $player->height ?? '' }}" class="form-control">
                        @if ($errors->has('height'))
                            <p class="text-danger">{{ $errors->first('height') }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="batting_style">Batting Style:</label>
                        <select name="batting_style" class="form-control">
                            <option selected disabled>Select batting style</option>
                            <option value="right_hand" {{ $player->batting_style == 'right hand' ? 'selected' : '' }}>
                                Right Hand Bat</option>
                            <option value="left_hand" {{ $player->batting_style == 'left hand' ? 'selected' : '' }}>Left
                                Hand Bat</option>
                        </select>
                        @if ($errors->has('batting_style'))
                            <p class="text-danger">{{ $errors->first('batting_style') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="club">Select Club:</label>
                    <select name="club_name" class="form-control">
                        <option value="" selected disabled>Select a Club</option>
                        @foreach ($clubs->unique('club_name') as $club)
                            {{-- Remove duplicate club names --}}
                            <option value="{{ $club->club_name }}"
                                {{ $player->club_name == $club->club_name ? 'selected' : '' }}>
                                {{ $club->club_name }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('club_name'))
                        <p class="text-danger">{{ $errors->first('club_name') }}</p>
                    @endif
                </div>

                <div class="col-md-4">
                    <label for="playing_role">Playing Role:</label>
                    <select name="playing_role" class="form-control">
                        <option selected disabled>Select player role</option>
                        <option value="batsman" {{ $player->playing_role == 'batsman' ? 'selected' : '' }}>Batsman
                        </option>
                        <option value="bowler" {{ $player->playing_role == 'bowler' ? 'selected' : '' }}>Bowler</option>
                        <option value="all_rounder" {{ $player->playing_role == 'all_rounder' ? 'selected' : '' }}>All
                            Rounder</option>
                        <option value="wicketkeeper_batsman"
                            {{ $player->playing_role == 'wicketkeeper_batsman' ? 'selected' : '' }}>Wicketkeeper Batsman
                        </option>
                        <option value="coach" {{ $player->playing_role == 'coach' ? 'selected' : '' }}>Coach</option>
                        <option value="umpire" {{ $player->playing_role == 'umpire' ? 'selected' : '' }}>Umpire</option>
                        <option value="manager" {{ $player->playing_role == 'manager' ? 'selected' : '' }}>Manager
                        </option>
                        <option value="administrator" {{ $player->playing_role == 'administrator' ? 'selected' : '' }}>
                            Administrator</option>
                    </select>
                    @if ($errors->has('playing_role'))
                        <p class="text-danger">{{ $errors->first('playing_role') }}</p>
                    @endif
                </div>
                <div class="col-md-3">
                    <label for="bowling_style">Bowling Style:</label>
                    <select name="bowling_style" class="form-control">
                        <option selected disabled>Select bowling style</option>
                        <option value="right_arm_off_break"
                            {{ $player->bowling_style == 'right_arm_off_break' ? 'selected' : '' }}>Right Arm Off Break
                        </option>
                        <option value="right_arm_leg_break"
                            {{ $player->bowling_style == 'right_arm_leg_break' ? 'selected' : '' }}>Right Arm Leg Break
                        </option>
                        <option value="left_arm_chinaman"
                            {{ $player->bowling_style == 'left_arm_chinaman' ? 'selected' : '' }}>Left Arm Chinaman
                        </option>
                        <option value="slow_right_arm_orthodox"
                            {{ $player->bowling_style == 'slow_right_arm_orthodox' ? 'selected' : '' }}>Slow Right Arm
                            Orthodox</option>
                        <option value="slow_left_arm_orthodox"
                            {{ $player->bowling_style == 'slow_left_arm_orthodox' ? 'selected' : '' }}>Slow Left Arm
                            Orthodox</option>
                        <option value="right_arm_medium_fast"
                            {{ $player->bowling_style == 'right_arm_medium_fast' ? 'selected' : '' }}>Right Arm Medium Fast
                        </option>
                        <option value="right_arm_fast" {{ $player->bowling_style == 'right_arm_fast' ? 'selected' : '' }}>
                            Right Arm Fast</option>
                        <option value="left_arm_medium_fast"
                            {{ $player->bowling_style == 'left_arm_medium_fast' ? 'selected' : '' }}>Left Arm Medium Fast
                        </option>
                        <option value="left_arm_fast" {{ $player->bowling_style == 'left_arm_fast' ? 'selected' : '' }}>
                            Left Arm Fast</option>
                        <option value="left_arm_wrist_spin"
                            {{ $player->bowling_style == 'left_arm_wrist_spin' ? 'selected' : '' }}>Left Arm Wrist Spin
                        </option>
                    </select>
                    @if ($errors->has('bowling_style'))
                        <p class="text-danger">{{ $errors->first('bowling_style') }}</p>
                    @endif
                </div>

            </div>

            <div class="row">
                <div class="col-md-5">
                    <label for="description">Description:</label>
                    <textarea name="description" class="form-control" id="textarea" rows="5">{{ $player->description }}</textarea>
                    <div id="count" style="color: #2E9E42;">
                        <span id="current_count">{{ mb_strlen($player->description ?? '') }}</span>
                        <span id="maximum_count">/ 1000</span>
                    </div>
                    @if ($errors->has('description'))
                        <p class="text-danger">{{ $errors->first('description') }}</p>
                    @endif
                </div>

                <div class="col-md-3">
                    <label for="status">Player Status:</label>
                    <select name="status" class="form-control">
                        <option selected disabled>Select status</option>
                        <option value="active" {{ $player->status === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $player->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @if ($errors->has('status'))
                        <p class="text-danger">{{ $errors->first('status') }}</p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label for="Picture">Picture:</label>
                    @if ($player->picture)
                        <img src="{{ asset($player->picture) }}" alt="{{ $player->name }}"
                            style="max-height: 100px; margin-top: 1%;">
                    @else
                        No Image
                    @endif
                    <input type="file" name="Picture" accept="image/*" class="mt-2 form-control-file">
                    @if ($errors->has('Picture'))
                        <p class="text-danger">{{ $errors->first('Picture') }}</p>
                    @endif
                </div>
            </div>
            <div style="margin-top: 1%;">
                <button type="submit" class="btn btn-primary">Update Player</button>
            </div>
        </form>


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
