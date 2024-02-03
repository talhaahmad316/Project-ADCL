@extends('admin.main-layout')

@section('content-header')
<style>
    .welcome {
        font-size: 24px;
        color: #333;
        font-weight: bold;
        padding: 10px;
    }
</style>

<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row" style="height:45px; width:102%; background-color: white; margin-left:-18px; ">
            <div class="col-sm-6" style="margin-top: 6px;">
                <h1 class="m-0">Club Board</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('body')
<div class="container-fluid">

    @if(auth()->check() && auth()->user()->role == 1)

    <div class="row">
        <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Club Name</th>
                        <th>Club Country</th> <!-- Corrected the spelling -->
                        <th>Personal Club</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clubs as $club)
                        <tr>
                            <td>{{ $club->club_name }}</td>
                            <td>{{ $club->club_countary }}</td>
                            <td>{{ $club->personal_club }}</td>
                            <td>{{ $club->description }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No clubs found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @else
        <p>You don't have permission to view this page.</p>
    @endif

</div>
@endsection
