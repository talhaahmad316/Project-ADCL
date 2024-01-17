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

<div class="container-fluid" style="margin-left: -20px; width:103%; height:109%; font-family: oswald; font-size:18px; background-color:white;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card team-details">
                <div class="card-header"><b style="font-size:26px;">Edit Team</b>
                    {{-- <form action="{{ route('admin.teams.destroy', ['team' => $team->id]) }}" method="POST" style="display: inline-block;"> --}}
                    @csrf
                    @method('DELETE')
                    <button style="margin-left: 990px;" type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this team?')">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>

                </div>

                <div class="card-body">
                    <form action="{{ route('admin.teams.update', ['team' => $team->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Team Logo -->
                        <div class="form-group">
                            <label for="logo">Team Logo:</label>
                            @if($team->logo)
                            <img src="{{ asset('storage/' . $team->logo) }}" alt="{{ $team->name }}" style="max-height: 100px; border-radius: 50%;">
                            @else
                            No Logo
                            @endif
                            <input type="file" name="logo" accept="image/*" class="form-control-file mt-2">
                        </div>

                        <!-- Team Name and Club -->
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="name">Team Name:</label>
                                <input type="text" name="name" class="form-control" value="{{ $team->name }}">
                            </div>
                            <div class="col-md-6">
                                <label for="club">Team Club:</label>
                                <select name="club" class="form-control">
                                    <option value="">Select a Club</option>
                                    <option value="adcl" {{ $team->club === 'adcl' ? 'selected' : '' }}>ADCL</option>

                                </select>
                            </div>
                        </div>

                        <!-- Team Status and Description -->
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="status">Team Status:</label>
                                <select name="status" class="form-control">
                                    <option value="active" {{ $team->status === 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $team->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" rows="4">{{ $team->description }}</textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update Team</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
