@extends('layouts.main')
@section('title') {{'ADCL All Players'}} @endsection

@section('contents')
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


<div style="margin-top: 14%;">

        <img src="images/orangecms.jpg" style="width: 100%; height:350px;" alt="">
        <div class="centered">All ADCL</div>
    </div><br><hr>
        {{-- <img src="//" alt="" srcset="" width="100%;" height="40%;"> --}}
        <h2 style="text-align: center; color: #f04414; font-size: 49px; font-weight: bolder;">ADCL Players Pool: {{ $players->total() }}</h2><hr>
        <div class="row" style="margin-left:20px;">
            @foreach($players as $player)
                <div class="col-md-3 mb-4"> <!-- Adjust column size to col-md-3 -->
                    <div class="team-column style-2" style="margin-bottom: 20px;"> <!-- Add margin-bottom style -->
                        <img src="{{ asset($player->picture) }}" alt="{{ $player->name }}"
                        height="400px;" width="310px;">
                        <div class="player-name">
                            <div class="desination-2" style="background-color:#f04414; font-family:Roboto;">ADCL</div>
                            <h5 style="font-family:Roboto;">{{ $player->name }}</h5>
                            <span class="player-number" style="background-color:#f04414; font-family:Roboto;">{{ $player->description }}</span>
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
    </div>
</div>
@endsection

