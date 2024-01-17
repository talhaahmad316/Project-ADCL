<!-- resources/views/adclTeams/adclReds.blade.php -->

@extends('layouts.main')
@section('title') {{'ADCL Reds'}} @endsection
@section('contents')
<!DOCTYPE html>
<html lang="en">
   <!-- Basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <!-- Site Metas -->

   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- Site Icons -->
   <link rel="shortcut icon" href="" type="image/x-icon" />
   <link rel="apple-touch-icon" href="">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- Site CSS -->
   <link rel="stylesheet" href="style.css">
   <!-- Colors CSS -->
   <link rel="stylesheet" href="css/colors.css">
   <!-- ALL VERSION CSS -->
   <link rel="stylesheet" href="css/versions.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="css/custom.css">
   <!-- font family -->
   <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>

   <!-- end font family -->
   <link rel="stylesheet" href="css/3dslider.css" />
   <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
   <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
   <script src="js/3dslider.js"></script>


<div style="margin-top: 14%;">
    <div class="text">
        <img src="images/redscms.jpg" style="width: 100%; height:350px;" alt="">
        <div class="centered">ADCL Reds</div>
    </div><br><hr>

    <h2 style="text-align: center; color: red; font-size: 44px; font-weight: bolder; font-family:oswald;">Reds Players Pool: {{ $players->count() }}</h2><hr>
    <div class="row" style="margin-left:20px;">
        @foreach($players as $player)
            <div class="col-md-3 mb-4">
                <div class="team-column style-2" style="margin-bottom: 20px;">
                    <img src="{{ asset('/storage/' . $player->picture) }}" alt="{{ $player->name }}" height="400px;" width="310px;">
                    <div class="player-name">
                        <div class="desination-2" style="font-family:Roboto;">ADCL Reds</div>
                        <h5 style="font-family:Roboto;">{{ $player->name }}</h5>
                        <span class="player-number" style="font-family:Roboto;">{{ $player->description }}</span>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="text-center">
            <!-- Laravel Pagination Links -->
            <div class="pagination">
                <p>Showing {{ $players->firstItem() }} to {{ $players->lastItem() }} of {{ $players->total() }} players</p>
                {{ $players->links() }}
            </div>
        </div>

    </div>
</div>
@endsection


<style>
    .text {
  position: relative;
  text-align: center;
  color: white;
}
.centered {
    position: absolute;
    text-align: center;
    left: 50%;
    margin-top:-10%;
    transform: translate(-50%, -50%);
    font-size: 85px;
    font-weight: bolder;
    color: white;
    text-shadow: 10px 10px 8px rgba(0, 0, 0, 0.5); /* Adjust values as needed */
}
.pagination{
    margin-bottom: 20px;
    color: red;
}
</style>
