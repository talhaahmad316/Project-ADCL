@extends('admin.main-layout')

@section('body')
    <style>
        body {
            background-color: #fff;
            font-family: 'Oswald', sans-serif;
        }

        .team-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
    <div class="container-fluid"
        style="margin-left: -20px; width:103%; height:109%; font-family: oswald; font-size:18px; background-color:white;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card team-details">
                    <div class="card-body">
                        <form action="{{ route('admin.teams.update', ['id' => $team->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Team Name and Club -->
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="name">Team Name:</label>
                                    <input type="text" name="name" class="form-control" value="{{ $team->name }}">
                                </div>

                                <div class="col-md-4">
                                    <label for="club">Select Club:</label>
                                    <select name="club" class="form-control" required>
                                        <option value="" selected disabled>Select a Club</option>
                                        @foreach ($clubs->unique('club_name') as $club)
                                            {{-- Remove duplicate club names --}}
                                            <option value="{{ $club->club_name }}"
                                                {{ $team->club == $club->club_name ? 'selected' : '' }}>
                                                {{ $club->club_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="status">Team Status:</label>
                                    <select name="status" class="form-control">
                                        <option value="" selected disabled>Select a Status</option>
                                        <option value="active" {{ $team->status === 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ $team->status === 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="description">Description:</label>
                                    <textarea name="description" class="form-control" id="textarea" rows="4">{{ $team->description }}</textarea>
                                    <div id="count" style=" color: #2E9E42;">
                                        <span id="current_count">{{ mb_strlen($team->description ?? '') }}</span>
                                        <span id="maximum_count">/ 1000</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="logo">Team Logo:</label>
                                    @if ($team->logo)
                                        <img src="{{ asset("$team->logo") }}" alt="{{ $team->name }}"
                                            style="max-height: 100px; border-radius: 50%;">
                                    @else
                                        No Logo
                                    @endif
                                    <input type="file" name="logo" accept="image/*" class="mt-2 form-control-file">
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary" style="margin-top: 1%">Update Team</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
