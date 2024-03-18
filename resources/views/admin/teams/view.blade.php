@extends('admin.main-layout')

@section('body')
<style>
    .team-details {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .team-logo img {
        max-height: 100px;
        border-radius: 50%;
        margin-right: 15px;
    }
</style>

<div class="container-fluid" style="margin-left: -20px; width:103.2%; ">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card team-details">
                <div class="card-header"><b style="font-family: oswald; font-size:26px;">Team Details</b></div>

                <div class="card-body">
                    <div class="row">
                        <!-- Team Logo -->
                        <div class="col-md-3 team-logo">
                            @if($team->logo) <span style="font-family: oswald; font-size:18px; font-weight:bold;">Team Logo</span>&nbsp;
                            <img src="{{ asset('storage/' . $team->logo) }}" alt="{{ $team->name }}">
                            @else
                            No Logo
                            @endif
                        </div>
                        <!-- Team Details -->
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name"style="font-family: oswald; font-size:18px; font-weight:bold;">Team Name:</label>
                                        <input type="text" name="name" class="form-control" value="{{ $team->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="club"style="font-family: oswald; font-size:18px; font-weight:bold;">Select Club:</label>
                                        <input type="text" name="club" class="form-control" value="{{ $team->club }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status"style="font-family: oswald; font-size:18px; font-weight:bold;">Team Status:</label>
                                        <input type="text" name="status" class="form-control" value="{{ $team->status }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="description"style="font-family: oswald; font-size:18px; font-weight:bold;">Team Description:</label>
                                        <input type="text" name="description" class="form-control" value="{{ implode(' ', array_slice(explode(' ', $team->description), 0, 14)) . '...' }}" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
