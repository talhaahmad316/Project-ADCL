@extends('admin.main-layout')

@section('body')
    <div class="container-fluid" style="font-family: oswald; font-size:18px; background-color:white; width:102%; margin-left:-10px; padding-left:22px;">
        <br>

        <h2><b>Edit Player Details</b></h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('players.update', ['player' => $player->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $player->name }}" required style="width: 50%;">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ $player->email }}" required style="width: 50%;" disabled>
            </div>

            <div class="form-group">
                <label for="nationality">Nationality:</label>
                <input type="text" name="nationality" class="form-control" value="{{ $player->nationality }}" required style="width: 50%;">
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control" required style="width: 50%;">
                    <option value="active" @if($player->status === 'active') selected @endif>Active</option>
                    <option value="inactive" @if($player->status === 'inactive') selected @endif>Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" id="textarea" style="width: 50%;" rows="5">{{ $player->description }}</textarea>
                <div id="count" style="margin-left: 47%; color: #2E9E42;">
                    <span id="current_count">0</span>
                    <span id="maximum_count">/ 1000</span>
                </div>
            </div>

            <div class="form-group">
                <label for="Picture">Picture:</label>
                @if($player->picture)
                    <img src="{{ asset('storage/' . $player->picture) }}" alt="{{ $player->name }}" style="max-height: 200px;">
                @else
                    No Image
                @endif
                <input type="file" name="Picture" accept="image/*" class="mt-2 form-control-file">
            </div>

            <div style="display: flex;">
                <button type="submit" class="btn btn-primary">Update Player</button>
            </div>
        </form>

        <div style="margin-left: 800px; margin-top: -40px;">
            <form action="{{ route('players.delete', ['player' => $player->id]) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this player?')">
                    <i class="fas fa-trash-alt">&nbsp;Delete Player</i>
                </button>
            </form>
            <br><br>
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
