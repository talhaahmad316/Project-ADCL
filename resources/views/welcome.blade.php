 @extends('layouts.main')
@section('contents')
<!DOCTYPE html>
<html lang="en">
   <!-- Basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <!-- Site Metas -->
   @section('title', 'UCL-UNITED CRICKET LADS')

   {{-- @section('title', 'UCL-ABU DHABI CRICKET LADS') --}}
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
   <style>

.wrap {
  position: relative;
}

.slide {
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height:700px;
}

.slide1 {
  background-image: url("images/bg1.png")

}

.slide2 {
  background-image: url("images/main-slider-img1.jpg")
}


/* .slide-content {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
} */



.arrow {
  cursor: pointer;
  position: absolute;
  top: 50%;
  margin-top: -35px;
  width: 0;
  height: 0;
  border-style: solid;
}

#arrow-left {
  border-width: 30px 40px 30px 0;
  border-color: transparent #FFF transparent transparent;
  left: 0;
  margin-left: 30px;
}

#arrow-right {
  border-width: 30px 0 30px 40px;
  border-color: transparent transparent transparent #FFF;
  right: 0;
  margin-right: 30px;
}


    </style>
   </head>
   <body class="game_info" data-spy="scroll" data-target=".header">
    <!-- LOADER -->
    {{-- <div id="preloader">
       <img class="preloader" src="images/loading-img.gif" alt="">
    </div> --}}
    <!-- END LOADER -->

<br><br><br><br><br>
    <section>

       <div class="full-slider">
        <div class="wrap">
            <div id="arrow-left" class="arrow"></div>
            <div id="slider">
              <div class="slide slide1">
                <div class="slide-content">
                </div>
              </div>
              <div class="slide slide2">
                <div class="slide-content">
              </div>
            <div id="arrow-right" class="arrow"></div>
          </div>
        <br>
          <!-- /.carousel -->
          <div class="news" style="background-color: #d2d2cf; color:black;">
             <div class="container">
                <div class="heading-slider" >
                   <p class="headline"><i class="fa fa-star" aria-hidden="true" ></i> Top Headlines :</p>
                   <h1>
                   <a href="" class="typewrite" data-period="2000" style="font-family:roboto;" data-type='[ "Our Upcoming Events Start", "From 16 September 2023"]'>
                   <span class="wrap"></span>
                   </a>
                   </h1
                   <span class="wrap"></span>
                   </a>
                </div>
             </div>
          </div>
       </div>
    </section>

   <script src="js/all.js"></script>
   <!-- ALL PLUGINS -->
   <script src="js/custom.js"></script>

      <div class="matchs-info" style=" margin-top: 0%; background:white; text-align: center" >
         <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="row">
               <div class="full">
                  <div class="matchs-vs">
                     <div class="vs-team">
                        <div class="team-btw-match">
                           <ul>
                              <li>
                                 {{-- <img src="images/greenlogo.png" alt=""> --}}
                                 <img src="logo.png" style="width: 161px;">
                                 <span>ABU DHABI CRICKET LADS</span>
                              </li>
                              <li class="vs"><span>vs</span></li>
                              <li>
                                 <img src="images/ACL.png" style="width: 144px;" alt="">
                                 <span>AL AIN CRICKET LADS </span>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-sm-6 col-xs-12" >
            <div class="row">
               <div class="full">
                  <div class="right-match-time">
                     <h2>Next Match</h2>
                     <ul id="countdown-1" class="countdown">
                        <li><span class="days">18 </span>Day </li>
                        <li><span class="hours">1 </span>Hours </li>
                        <li><span class="minutes">30</span>Minutes </li>
                        <li><span class="seconds">10 </span>Seconds </li>
                     </ul>
                     <span>16/09/2023 /07:30pm</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <section >

        <div class="container my-5">
            <div class="row">
              <div class="col-lg-8">
                <div class="p-5 mt-4">
                    <h2 style="font-size:24px; font-family:oswald;">2014 Since</h2>
                    <h1 class="display-4" style="font-weight: bold; text-align: left; font-family:oswald;">UNITED CRICKET LADS</h1>
                    <h1 class="display-4" style="text-align: left; font-family:oswald;">CRICKET CLUB</h1>
                    <p class="lead" style="text-align: left; font-size:15px; font-family:roboto;" >UCL was officially formed on May 17th, 2014. ADCL is not your usual club filled with professional cricketers,
                        however, it is a group of working Lads who are serious about cricket as their passion and hobby and are willing to put the
                        effort into this passio to achieve feats in line of professional cricket clubs and teams in different tournaments around UAE (Mainly Abu Dhabi/Al Ain/Dubai).
                    <br>Since conception, ADCL has evolved into 4 full-time teams based on 4 talent pools, namely, Reds, Greens, Yellows and Blues which gives a full chance to all the lads to expand their skill and experience and increased exposure to ADCL in different tournaments. As of now, the total
                    strength combined of all Pools has crossed 80 permanent members.
                    <br>ADCL strength comprises of nationals from Pakistan, India, Afghanistan, Bangladesh and England. We have had SriLankan, South African and Zimbabwe nationals also playing with us in the past. Members inducted are beyond nationalities, class, religion and social status.
                    ADCL conducts weekly 2 hours net sessions in Abu Dhabi, On average 50 sessions per Season.
                </p>
                    {{-- <a href="#" class="btn btn-outline-dark">Read More</a> --}}
                  </div>
              </div>
              <div class="col-lg-4" style="margin-left: -15px; margin-top:136px;">
                <div>
                    <video controls width="480" height="460">
                        <source src="https://www.adcricketlads.com/wp-content/uploads/2021/09/ADCL8-Intro-Final-400x400-1.mp4" type="video/mp4">

                    </video>
              </div>
          </div>
      </section>

      <section id="contant" class="contant">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-sm-4 col-xs-12" style="margin-top: -39px; ">

                  <h4 style="font-family:oswald;"><b>Match Fixture</b></h4>
                  <aside id="sidebar" class="left-bar">
                     <div class="feature-matchs">
                        <div class="team-btw-match" >
                           <ul>
                              <li>
                                 <img src="images/Redlogo.png" alt="" height="50px" width="50px">
                                 <span style="font-family:roboto;">REDS</span>
                              </li>
                              <li class="vs"><span>vs</span></li>
                              <li>
                                 <img src="images/blacklogo.png" alt=""height="50px" width="50px">
                                 <span style="font-family:roboto;">BLACKS</span>
                              </li>
                           </ul>
                           <ul>
                              <li>
                                 <img src="images/greenlogo.png" alt=""height="50px" width="50px">
                                 <span style="font-family:roboto;">GREENS</span>
                              </li>
                              <li class="vs"><span>vs</span></li>
                              <li>
                                 <img src="images/yellowlogo.png" alt="" height="50px" width="50px">
                                 <span style="font-family:roboto;">YELLOWS</span>
                              </li>
                           </ul>
                           <ul>
                              <li>
                                 <img src="images/greylogo.png" alt=""height="50px" width="80px">
                                 <span style="font-family:roboto;">GREYS</span>
                              </li>
                              <li class="vs"><span>vs</span></li>
                              <li>
                                 <img src="images/blacklogo.png" alt=""height="50px" width="50px">
                                 <span style="font-family:roboto;"style="font-family:roboto;">BLACKS</span>
                              </li>
                           </ul>
                           <ul>
                              <li>
                                 <img src="images/greenlogo.png" alt=""height="50px" width="50px">
                                 <span style="font-family:roboto;">GREENS</span>
                              </li>
                              <li class="vs"><span>vs</span></li>
                              <li>
                                 <img src="images/bluelogo.png" alt=""height="50px" width="50px">
                                 <span style="font-family:roboto;">BLUES</span>
                              </li>
                           </ul>
                           <ul>
                              <li>
                                 <img src="images/redlogo.png" alt=""height="50px" width="50px">
                                 <span style="font-family:roboto;">REDS</span>
                              </li>
                              <li class="vs"><span>vs</span></li>
                              <li>
                                 <img src="images/greylogo.png" alt=""height="50px" width="80px">
                                 <span style="font-family:roboto;">GREY</span>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </aside>
                  <h4 style="font-family:oswald;"><b>Points Table</b></h4>
                  <aside id="sidebar" class="left-bar">
                     <div class="feature-matchs">
                        <table class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Team</th>
                                 <th>P</th>
                                 <th>W</th>
                                 <th>L</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td><img src="images/redLogo.png" alt=""height="30px" width="30px">ADCL REDS</td>
                                 <td>10</td>
                                 <td>12</td>
                                 <td>20</td>
                              </tr>
                              <tr>
                                 <td>2</td>
                                 <td><img src="images/yellowlogo.png" alt=""height="30px" width="30px">ADCL YELLOWS</td>
                                 <td>10</td>
                                 <td>12</td>
                                 <td>20</td>
                              </tr>
                              <tr>
                                 <td>3</td>
                                 <td><img src="images/blacklogo.png" alt=""height="30px" width="30px">ADCL BLACKS</td>
                                 <td>20</td>
                                 <td>15</td>
                                 <td>20</td>
                              </tr>
                              <tr>
                                 <td>4</td>
                                 <td><img src="images/bluelogo.png" alt=""height="30px" width="30px">ADCL BLUES</td>
                                 <td>60</td>
                                 <td>10</td>
                                 <td>60</td>
                              </tr>

                              <tr>
                                 <td>5</td>
                                 <td><img src="images/greenlogo.png" alt=""height="30px" width="29px">ADCL Greens</td>
                                 <td>10</td>
                                 <td>12</td>
                                 <td>20</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </aside>

               </div>
               <div class="col-lg-8 col-sm-8 col-xs-12">
                  <div class="news-post-holder">
                     <div class="news-post-widget">
                        <img class="img-responsive" src="images/img-03_003.jpg" alt="">
                        <div class="news-post-detail">
                           {{-- <span class="date" style="font-family:oswald; font-size:16px;">20 march 2016</span> --}}
                           <h2 ><a href="blog-detail.html" style="font-family:oswald; font-size:24px;">ADCL CONCEPT OWNER & MANAGER<br>USMAN NAZAR RATHORE</a></h2>
                           <p style=" font-size:16px;" >ADCL was a concept conceived by myself back in 2014. The concept and its implementation to date represents Amateur brand of cricket with professional, target oriented, Trustable and successful mantra as a brand.

                            The brand of ADCL has challenged me from professional skills to personal life management as well and i am proud to see that i have done well to establish ADCL as a successful brand.

                            I invite you all to join this amazing and one of a kind cricketing experience which is open for all with two main moto’s NEVER GIVE IN & VICTORY WITH DIGNITY.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section>
         {{-- <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main-heading sytle-2">
                        <h2>Video</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium<br>doloremque laudantium, totam rem aperiam</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="video_section_main theme-padding middle-bg vedio">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="match_vedio">
                        <img class="img-responsive" src="images/img-07.jpg" alt="#" />
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section> --}}
      <div class="team-holder theme-padding">
         <div class="container">
            <div class="main-heading-holder">
               <div class="main-heading sytle-2">
                  <h2 style="font-family:oswald;">Meet Your Team</h2>
                  <p style="">Meet the powerhouse behind ADCL – our dedicated team of cricket enthusiasts, united by the <br> love of the game and a passion for excellence.</p>
               </div>
            </div>
            <div id="team-slider">
                <div class="col-md-3 mb-4"> <!-- Add margin-bottom to create space -->
                    <div class="team-column style-2" >
                        <img src="images/img-1-1.png"  alt="" height="320px;" width="270px">
                        <div class="player-name" style="font-family:oswald;">
                            <div class="desination-2" style="font-family:oswald;">Abdul Qayyoum</div>
                            <h5 style="font-family:oswald;">ADCL REDS</h5>
                            <span class="player-number">C</span>
                        </div>

                    </div>
                </div>
                <div class="col-md-3 mb-4"> <!-- Add margin-bottom to create space -->
                    <div class="team-column style-2">
                        <img src="images/img-1-2.png" alt="" height="320px;" width="270px">
                        <div class="player-name">
                            <div class="desination-2" style="background-color: green; font-family:oswald;">Osama</div>
                            <h5 style="font-family:oswald;">ADCL GREENS</h5>
                            <span class="player-number" style="background-color: green;">C</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4"> <!-- Add margin-bottom to create space -->
                    <div class="team-column style-2">
                        <img src="images/img-1-3.png" alt=""  alt="" height="320px;" width="270px">
                        <div class="player-name">
                            <div class="desination-2" style="background-color: rgb(220, 220, 67); font-family:oswald;">Sheraz Khan</div>
                            <h5 style="font-family:oswald;">ADCL YELLOWS</h5>
                            <span class="player-number" style="background-color:  rgb(220, 220, 67);">C</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4"> <!-- Add margin-bottom to create space -->
                    <div class="team-column style-2">
                        <img src="images/Bharat-Shaunak.webp" alt="" alt="" height="320px;" width="270px">
                        <div class="player-name">
                            <div class="desination-2" style="background-color: skyblue; font-family:oswald;" >Bharat Shaunak</div>
                            <h5 style="font-family:oswald;">ADCL BLUES</h5>
                            <span class="player-number" style="background-color: skyblue;">C</span>
                        </div>
                    </div>
                </div>
                <div style="margin-left: 10%;">
                <div class="col-md-3 mb-4"> <!-- Add margin-bottom to create space -->
                    <div class="team-column style-2">
                        <img src="images/samad-khan.webp" alt="" alt="" height="320px;" width="270px">
                        <div class="player-name">
                            <div class="desination-2" style="background-color: Grey; font-family:oswald;" >Samad Khan</div>
                            <h5 style="font-family:oswald;">ADCL GREYS</h5>
                            <span class="player-number" style="background-color: Grey;">C</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4" style="margin-left: 5%;"> <!-- Add margin-bottom to create space -->
                    <div class="team-column style-2">
                        <img src="images/farhan-niazi.png" alt="" alt="" height="320px;" width="270px">
                        <div class="player-name">
                            <div class="desination-2" style="background-color: rgb(39, 39, 39); font-family:oswald;" >Farhan Niazi</div>
                            <h5 style="font-family:oswald;">ADCL BLACKS</h5>
                            <span class="player-number" style="background-color: rgb(39, 39, 39);">C</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4" style="margin-left: 5%;"> <!-- Add margin-bottom to create space -->
                    <div class="team-column style-2">
                        <img src="logo.png" alt="" alt="" height="320px;" width="270px">
                        <div class="player-name">
                            <div class="desination-2" style="background-color: #f88c00; font-family:oswald;" >ADCL</div>
                            <h5 style="font-family:oswald;">ADCL Generals</h5>
                            <span class="player-number" style="background-color: #f88c00;">C</span>
                        </div>
                    </div>
                </div>
            </div>

            </div>

         </div>
      </div>
      <script>
         let sliderImages = document.querySelectorAll('.slide'),
             arrowLeft = document.querySelector('#arrow-left'),
             arrowRight = document.querySelector('#arrow-right'),
             current = 0;

         // clear all images
         function reset() {
             for (let i = 0; i < sliderImages.length; i++) {
                 sliderImages[i].style.display = 'none';
             }
         }

         // initialize slider
         function startSlide() {
             reset();
             sliderImages[0].style.display = 'block';
         }

         // show previous
         function slideLeft() {
             reset();
             if (current === 0) {
                 current = sliderImages.length - 1;
             } else {
                 current--;
             }
             sliderImages[current].style.display = 'block';
         }

         // show next
         function slideRight() {
             reset();
             if (current === sliderImages.length - 1) {
                 current = 0;
             } else {
                 current++;
             }
             sliderImages[current].style.display = 'block';
         }

         // left arrow click
         arrowLeft.addEventListener('click', function () {
             slideLeft();
         });

         // right arrow click
         arrowRight.addEventListener('click', function () {
             slideRight();
         });

         // auto slide every 3000 milliseconds (adjust the time as needed)
         setInterval(function () {
             slideRight();
         }, 3000);

         startSlide();
     </script>



@endsection


