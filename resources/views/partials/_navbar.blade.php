<link href="assets/vendor/aos/aos.css" rel="stylesheet">
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link href="assets/css/style.css" rel="stylesheet">

  <!-- ======= Header ======= -->

  <header id="header" >

    <div style="display: flex; align-items: center; background-color: rgb(61, 61, 61); padding: 10px; ">
        <div style="flex: 1; color:white; margin-left: 170px; font-size: 18px; ">ADCL Cricket Club</div>
        <div class="icon-container" style="font-size: 24px; margin-right: 98px;">
            <a href="https://www.facebook.com/groups/ADCricketLads/"  onMouseOver="this.style.color='#f04414'" onMouseOut="this.style.color='white'"
             class="social-link" style="text-decoration: none; color:white;" target="_blank">
                <i class="fab fa-facebook"> </i>
            </a>
            <a href="https://www.youtube.com/@FourthUmpire" class="social-link" onMouseOver="this.style.color='#f04414'" onMouseOut="this.style.color='white'"
             style="text-decoration: none; color:white;"target="_blank">
                <i class="fab fa-youtube"></i>
            </a>
            <a href="https://twitter.com/adcricketclub?lang=da" class="social-link" onMouseOver="this.style.color='#f04414'" onMouseOut="this.style.color='white'"
             style="text-decoration: none; color:white;"target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
        </div>
    </div><br>
    <div class="container d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}"><img src="logo.png" alt="" srcset="" height="150px;" width="150px;" style="margin-left:-40px;"></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar" style="margin-left: 290px;  ">
        <ul >
          <li><a class="nav-link scrollto active" href="{{ route('home') }}" style=" font-size:24px;">Home</a></li>
          <li class="dropdown"><a href="{{ route('adclAll') }}" ><span style=" font-size:24px;">Player Pool</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="{{ route('adclAll') }}" >ADCL ALL</a></li>
              <li><a href="{{ route('adclReds.players') }}">ADCL REDS</a></li>
              <li><a href="{{ route('adclBlues.players') }}" >ADCL BLUES</a></li>
              <li><a href="{{ route('adclGreens.players') }}" >ADCL GREENS</a></li>
              <li><a href="{{ route('adclYellows.players') }}" >ADCL YELLOWS</a></li>
              <li><a href="{{ route('adclGreys.players') }}" >ADCL GREYS</a></li>
              <li><a href="{{ route('adclBlacks.players') }}" >ADCL BLACKS</a></li>
              <li><a href="#">ADCL GENRALS</a></li>




            </ul>
          </li>
          <li><a class="nav-link scrollto" href="{{ route('rulesRegulations') }}" style="font-size:24px;">Rules and Regulations</a></li>
          <li><a class="nav-link scrollto" href="{{ route('ranking') }}" style=" font-size:24px;">Season Rankings</a></li>
          <li><a class="nav-link scrollto " href="{{ route('about') }}" style="font-size:24px;">About</a></li>
          <li><a class="nav-link scrollto" href="{{ route('contact') }}" style=" font-size:24px;">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
    {{-- <style>
        /* Apply Oswald font to all headings (h1, h2, h3, h4, h5, h6) */
    h1, h2, h3, h4, h5, h6 {
        font-family: 'Oswald', sans-serif;
    }

    /* Apply Roboto font to the body text */
    body {
        font-family: 'Roboto', sans-serif;
    }

        </style> --}}
  </header><!-- End Header -->

