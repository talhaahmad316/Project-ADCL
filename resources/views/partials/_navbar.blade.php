<link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

<header id="header">

    <div style="display: flex; align-items: center; background-color: rgb(61, 61, 61); padding: 10px; ">
        <div style="flex: 1; color:white; margin-left: 170px; font-size: 18px; ">UCL Cricket Club</div>
        <div class="icon-container" style="font-size: 24px; margin-right: 98px;">
            <a href="https://www.facebook.com/groups/ADCricketLads/" onMouseOver="this.style.color='#f04414'"
                onMouseOut="this.style.color='white'" class="social-link" style="text-decoration: none; color:white;"
                target="_blank">
                <i class="fab fa-facebook"> </i>
            </a>
            <a href="https://www.youtube.com/@FourthUmpire" class="social-link" onMouseOver="this.style.color='#f04414'"
                onMouseOut="this.style.color='white'" style="text-decoration: none; color:white;"target="_blank">
                <i class="fab fa-youtube"></i>
            </a>
            <a href="https://twitter.com/adcricketclub?lang=da" class="social-link"
                onMouseOver="this.style.color='#f04414'" onMouseOut="this.style.color='white'"
                style="text-decoration: none; color:white;"target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
        </div>
    </div><br>
    <div class="container d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}"><img src="{{ asset('ucl.png') }}" alt="" srcset="" height="150px;"
                width="150px;" style="margin-left:-40px;"></a>
        <nav id="navbar" class="navbar" style="margin-left: 290px;  ">
            <ul>
                <li><a class="nav-link scrollto active" href="{{ route('home') }}" style=" font-size:24px;">Home</a>
                </li>
                <li class="dropdown"><a href="{{ route('adclAll') }}"><span style=" font-size:24px;">Player Pool</span>
                        <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('adclAll') }}">ADCL ALL</a></li>
                        @php
                            $teams = \App\Models\Team::all();
                        @endphp
                        @foreach ($teams as $team)
                            <li>
                                <a href="{{ url('/player-detail', $team->id ?? '') }}">{{ $team->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="{{ route('rulesRegulations') }}" style="font-size:24px;">Rules
                        and Regulations</a></li>
                <li><a class="nav-link scrollto" href="{{ route('ranking') }}" style=" font-size:24px;">Season
                        Rankings</a></li>
                <li><a class="nav-link scrollto " href="{{ route('about') }}" style="font-size:24px;">About</a></li>
                <li><a class="nav-link scrollto" href="{{ route('contact') }}" style=" font-size:24px;">Contact</a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
