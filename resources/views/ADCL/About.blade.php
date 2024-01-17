@extends('layouts.main')
@section('contents')
@section('title', 'About ')
<!DOCTYPE html>
<html lang="en">
   <!-- Basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <!-- Site Metas -->
   @section('title', 'ADCL-ABU DHABI CRICKET LADS')
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

   <!-- end font family -->
   <link rel="stylesheet" href="css/3dslider.css" />
   <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
   <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
   <script src="js/3dslider.js"></script>
<style>
    .text1 {
  position: relative;
  text-align: center;
  color: white;
}
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 50px;
  font-weight: bolder;
  font-family: oswald;
  text-shadow: 10px 10px 8px rgba(0, 0, 0, 0.5); /* Adjust values as needed */

}
blockquote {
    position: relative;
    text-align: left;
    padding: 1.2em 0 2em 38px;
    border: none;
    font-family: Roboto;
    font-weight: bolder;
    max-width: 400px;
    width:100%;
    display: block;
}

blockquote:after {
    content: "";
    display: block;
    width: 2px;
    height: 100%;
    position: absolute;
    left: 0;
    color: #f04414;
    top: 0;
    background: -moz-linear-gradient(top,#f04414 0%,#f04414 60%,rgba(255,255,255,0) 100%);
    background: -webkit-linear-gradient(top,#f04414 0%,#f04414 60%,rgba(255,255,255,0) 100%);
    /* background: linear-gradient(to bottom,# 0%,#66cc66 60%,rgba(255,255,255,0) 100%); */
}

blockquote:before {
    content:"\f10d";
    font-family: "fontawesome";
    font-size: 20px;
    display: block;
    margin-bottom: 0.8em;
    font-weight: 400;
    color: #f04414;
}

blockquote > cite,
blockquote > p > cite {
    display: block;
    font-size: 16px;
    line-height: 1.3em;
    font-weight: 700;
    font-style: normal;
    margin-top: 1.1em;
    letter-spacing: 0;
    font-style:italic;
}



</style>

<div style="margin-top: 14%;">
    {{-- <img src="images/rules.webp" alt="" srcset="" width="100%;" height="55%;"><br><br><br> --}}
    <div class="text1">
        <img src="images/orangecms.jpg" style="width: 100%; height:350px;" alt="">
        <div class="centered">About ADCL</div>
    </div><br>


    <div class="responsive-container-block bigContainer">
        <div class="responsive-container-block Container bottomContainer">
          <div class="ultimateImg" >
            <img class="mainImg" src="https://www.adcricketlads.com/wp-content/uploads/2022/01/Usman-Nazar-Rathore-Founder-ADCL.png" style="margin-left: 274px;">
          </div>
          <div class="allText bottomText">
            <p class="text-blk headingText">
                USMAN NAZAR RATHORE
            </p>
            <p class="text-blk subHeadingText">
                ADCL CONCEPT, OWNER & MANAGER
            </p>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<blockquote class="wp-block-quote"><p> A VISION, DREAM, REALITY & DESTINY </p></blockquote>

            <p class="text-blk description">
                ADCL has evolved into 5 full-time teams based on 5 talent pools, namely, Reds, Greens, Yellows, Blues,
                and Blacks which gives a full chance to all the lads to expand their skill and experience and increased exposure
                to ADCL in different internal and external tournaments (including International tours).
                 As of now, the total strength combined of all Pools has crossed 150 permanent members.
            </p>
            <a href="{{ route('contact') }}" class="explore">
                COME JOIN ADCL TODAY!!!
            </a>
          </div>
        </div>
      </div>
</div>

<!--Team Concil-->
<div class="teamWrapper">
    <div class="container">
      <h1 align="center" style="font-size: 38px; font-weight:bold; color:#f04414; font-family:oswald;">ADCL Core Council Members</h1><hr>
      <div class="teamGrid">
        <div class="colmun">
          <div class="teamcol">
            <div class="teamcolinner">
              <div class="avatar"><img src="images/bilal.webp" alt="Member"></div>
              <div class="member-name"> <h2 align="center" style="font-family:oswald; font-size:20px; font-weight:bold;">Bilal Suleman</h2> </div>
              <span style=" font-family:Roboto; font-size:16px;" > <center>Core Council Member</center> </span>
              <div class="member-info"><p align="center">Information coming soon about core council members of ADCL.</p></div>
            </div>
          </div>
        </div>
        <div class="colmun">
          <div class="teamcol">
            <div class="teamcolinner">
              <div class="avatar"><img src="images/khawar.webp" alt="Member"></div>
              <div class="member-name"> <h2 align="center" style="font-family:oswald; font-size:20px; font-weight:bold;">Khawar Sheikh</h2> </div>
              <span style=" font-family:Roboto; font-size:16px;" > <center>Core Council Member</center> </span>
              <div class="member-info"><p align="center">Information coming soon about core council members of ADCL.</p></div>
            </div>
          </div>
        </div>

        <div class="colmun">
            <div class="teamcol">
              <div class="teamcolinner">
                <div class="avatar"><img src="images/farhan.png" alt="Member"></div>
                <div class="member-name"> <h2 align="center" style="font-family:oswald; font-size:20px; font-weight:bold;">Faran Khalid Cheema</h2> </div>
                <span style=" font-family:Roboto; font-size:16px;" > <center>Core Council Member</center> </span>
                <div class="member-info"><p align="center">Information coming soon about core council members of ADCL.</p></div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
<br>
<div class="teamWrapper">
    <div class="container">
      <div class="teamGrid" style="display: flex; justify-content: space-between;">
        <div class="colmun">
            {{-- <div class="teamcol">
              <div class="teamcolinner">
                <div class="avatar"><img src="images/USMAN-ASAD.jpg" alt="Member" height="150px;"></div>
                <div class="member-name"> <h2 align="center">Usman Asad</h2> </div>
                <span style="margin-left: 75px;">Core Council Member</span>
                <div class="member-info"><p align="center">Information coming soon about core council members of ADCL.</p></div>
              </div>
            </div> --}}
          </div>
          <div class="colmun">
            <div class="teamcol">
              <div class="teamcolinner">
                <div class="avatar"><img src="images/Abubakar-azam.png" alt="Member"></div>
                <div class="member-name"> <h2 align="center" style="font-family:oswald; font-size:20px; font-weight:bold;">Abubakar Azam</h2> </div>
                <span style=" font-family:Roboto; font-size:16px;" > <center>Core Council Member</center> </span>
                <div class="member-info"><p align="center">Information coming soon about core council members of ADCL.</p></div>
              </div>
            </div>
          </div>
          <div class="colmun">
            <div class="teamcol">
              <div class="teamcolinner">
                <div class="avatar"><img src="images/Muhammad-Haroon.jpg" alt="Member" height="160px;"></div>
                <div class="member-name"> <h2 align="center" style="font-family:oswald; font-size:20px; font-weight:bold;">Muhammad Haroon</h2> </div>
                <span style=" font-family:Roboto; font-size:16px;" > <center>Core Council Member</center> </span>
                <div class="member-info"><p align="center">Information coming soon about core council members of ADCL.</p></div>
              </div>
            </div>
          </div>
          <div class="colmun">
            <div class="teamcol">
              <div class="teamcolinner">
                <div class="avatar"><img src="images/WAQAS-BUTT.jpg" height="160px;" alt="Member"></div>
                <div class="member-name"> <h2 align="center" style="font-family:oswald; font-size:20px; font-weight:bold;">Waqas Butt</h2> </div>
                <span style=" font-family:Roboto; font-size:16px;" > <center>Core Council Member</center> </span>
                <div class="member-info"><p align="center">Information coming soon about core council members of ADCL.</p></div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  <br><br><br><br><br>. <br><br><br>




<style>


.responsive-container-block {
  min-height: 75px;
  height: fit-content;
  width: 100%;
  padding-top: 10px;
  padding-right: 10px;
  padding-bottom: 10px;
  padding-left: 10px;
  display: flex;
  flex-wrap: wrap;
  margin-top: 0px;
  margin-right: auto;
  margin-bottom: 0px;
  margin-left: auto;
  justify-content: flex-start;
}

a {
  text-decoration-line: none;
  text-decoration-thickness: initial;
  text-decoration-style: initial;
  text-decoration-color: initial;
}

.text-blk {
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  padding-top: 10px;
  padding-right: 10px;
  padding-bottom: 10px;
  padding-left: 10px;
  line-height: 25px;
}

.responsive-container-block.bigContainer {
  padding-top: 10px;
  padding-right: 30px;
  padding-bottom: 10px;
  padding-left: 30px;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 10px 50px 10px 50px;
}

.mainImg {
  color: black;
  width: 60%;
  height: 30%;
  border-radius: 10px; /* Combine all border-radius properties into one */
  transition: transform 0.3s; /* Add a transition for the transform property */
}

.mainImg:hover {
  transform: scale(1.1); /* Scale up the image on hover */
}


.text-blk.headingText {
  font-size: 24px;
  font-weight: bolder;
  line-height: 30px;
  color: #f88c00;
  padding-top: 0px;
  font-family: oswald;
  padding-right: 10px;
  padding-bottom: 0px;
  padding-left: 0px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 5px;
  margin-left: 0px;
}

.allText {
  padding-top: 0px;
  padding-right: 0px;
  padding-bottom: 0px;
  padding-left: 0px;
  width: 40%;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
}

.text-blk.subHeadingText {
  color: rgb(102, 102, 102);
  font-size: 26px;
  line-height: 32px;
  font-weight: 700;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 15px;
  margin-left: 0px;
  padding-top: 0px;
  font-family: oswald;
  padding-right: 10px;
  padding-bottom: 0px;
  padding-left: 0px;
}

.text-blk.description {
  font-size: 18px;
  line-height: 26px;
  color: rgb(102, 102, 102);
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 50px;
  margin-left: 0px;
  font-weight: 400;
  text-align: left;
  font-family: Roboto;
  padding-top: 0px;
  padding-right: 10px;
  padding-bottom: 0px;
  padding-left: 0px;
}

.explore {
  font-size: 16px;
  line-height: 28px;
  color: f88c00;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  font-weight: bold;
  border-top-width: 2px;
  border-right-width: 2px;
  border-bottom-width: 2px;
  border-left-width: 2px;
  border-top-style: solid;
  border-right-style: solid;
  border-bottom-style: solid;
  border-left-style: solid;
  border-top-color: #f88c00;
  border-right-color: #f88c00;
  border-bottom-color: #bc270a;
  border-left-color: #bc270a;
  border-image-source: initial;
  border-image-slice: initial;
  border-image-width: initial;
  border-image-outset: initial;
  border-image-repeat: initial;
  cursor: pointer;
  background-color: white;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  padding-top: 8px;
  padding-right: 40px;
  padding-bottom: 8px;
  padding-left: 40px;
}

.explore:hover {
  background-image: initial;
  background-position-x: initial;
  background-position-y: initial;
  background-size: initial;
  background-repeat-x: initial;
  background-repeat-y: initial;
  background-attachment: initial;
  background-origin: initial;
  background-clip: initial;
  background-color: #f88c00;
  color: white;
  border-top-width: initial;
  border-right-width: initial;
  border-bottom-width: initial;
  border-left-width: initial;
  border-top-style: none;
  border-right-style: none;
  border-bottom-style: none;
  border-left-style: none;
  border-top-color: initial;
  border-right-color: initial;
  border-bottom-color: initial;
  border-left-color: initial;
  border-image-source: initial;
  border-image-slice: initial;
  border-image-width: initial;
  border-image-outset: initial;
  border-image-repeat: initial;
}

.responsive-container-block.Container {
  margin-top: 80px;
  margin-right: auto;
  margin-bottom: 50px;
  margin-left: auto;
  justify-content: center;
  align-items: center;
  max-width: 1320px;
  padding-top: 10px;
  padding-right: 10px;
  padding-bottom: 10px;
  padding-left: 10px;
}

.responsive-container-block.Container.bottomContainer {
  flex-direction: row-reverse;
  margin-top: 80px;
  margin-right: auto;
  margin-bottom: 50px;
  margin-left: auto;
  position: static;
}

.allText.aboveText {
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 40px;
}

.allText.bottomText {
  margin-top: 0px;
  margin-right: 40px;
  margin-bottom: 0px;
  margin-left: 0px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  padding-top: 0px;
  padding-right: 15px;
  padding-bottom: 0px;
  padding-left: 0px;
}

.purpleBox {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  max-width: 430px;
  background-color: #f88c00;
  padding-top: 20px;
  padding-right: 20px;
  padding-bottom: 20px;
  padding-left: 20px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
  border-bottom-left-radius: 10px;
  position: absolute;
  bottom: -35px;
  left: -8%;
}

.purpleText {
  font-size: 18px;
  line-height: 26px;
  color: white;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 10px;
  margin-left: 0px;
}

.ultimateImg {
  width: 50%;
  position: relative;
}

@media (max-width: 1024px) {
  .responsive-container-block.Container {
    max-width: 850px;
  }

  .mainImg {
    width: 55%;
    height: auto;
  }

  .allText {
    width: 40%;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 20px;
  }

  .responsive-container-block.bigContainer {
    padding-top: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
  }

  .responsive-container-block.Container.bottomContainer {
    margin-top: 80px;
    margin-right: auto;
    margin-bottom: 50px;
    margin-left: auto;
  }

  .responsive-container-block.Container {
    max-width: 830px;
  }

  .allText.aboveText {
    margin-top: 30px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 40px;
  }

  .allText.bottomText {
    margin-top: 30px;
    margin-right: 40px;
    margin-bottom: 0px;
    margin-left: 0px;
    text-align: left;
  }

  .text-blk.headingText {
    text-align: center;
  }

  .allText.aboveText {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-top: 30px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
  }

  .text-blk.subHeadingText {
    text-align: left;
    font-size: 26px;
    line-height: 32px;
  }

  .text-blk.description {
    text-align: left;
    line-height: 24px;
  }

  .explore {
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
  }

  .responsive-container-block.bigContainer {
    padding-top: 10px;
    padding-right: 30px;
    padding-bottom: 10px;
    padding-left: 30px;
  }

  .responsive-container-block.Container {
    justify-content: space-evenly;
  }

  .purpleBox {
    bottom: 10%;
  }

  .responsive-container-block.Container.bottomContainer {
    padding-top: 10px;
    padding-right: 0px;
    padding-bottom: 10px;
    padding-left: 0px;
    max-width: 930px;
  }

  .allText.bottomText {
    width: 40%;
  }

  .purpleBox {
    bottom: auto;
    left: -10%;
    top: 70%;
  }

  .mainImg {
    width: 100%;
  }

  .text-blk.headingText {
    text-align: left;
  }
}

@media (max-width: 768px) {
  .allText {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding-top: 0px;
    padding-right: 0px;
    padding-bottom: 0px;
    padding-left: 0px;
  }

  .responsive-container-block.Container {
    flex-direction: column;
    height: auto;
  }

  .text-blk.headingText {
    text-align: center;
  }

  .text-blk.subHeadingText {
    text-align: center;
    font-size: 24px;
  }

  .text-blk.description {
    text-align: center;
    font-size: 18px;
  }

  .allText {
    margin-top: 40px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
  }

  .allText.aboveText {
    margin-top: 40px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
  }

  .responsive-container-block.Container {
    margin-top: 80px;
    margin-right: auto;
    margin-bottom: 50px;
    margin-left: auto;
  }

  .responsive-container-block.Container.bottomContainer {
    margin-top: 50px;
    margin-right: auto;
    margin-bottom: 50px;
    margin-left: auto;
  }

  .allText.bottomText {
    margin-top: 40px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
  }

  .mainImg {
    width: 100%;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: -70px;
    margin-left: 0px;
  }

  .responsive-container-block.Container.bottomContainer {
    flex-direction: column;
  }

  .ultimateImg {
    width: 100%;
  }

  .purpleBox {
    position: static;
  }

  .allText.bottomText {
    width: 100%;
    align-items: flex-start;
  }

  .text-blk.headingText {
    text-align: left;
  }

  .text-blk.subHeadingText {
    text-align: left;
  }

  .text-blk.description {
    text-align: left;
  }

  .ultimateImg {
    position: static;
  }

  .mainImg {
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
  }

  .ultimateImg {
    position: relative;
  }

  .purpleBox {
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
    position: absolute;
    left: 0px;
    top: 80%;
  }

  .allText.bottomText {
    margin-top: 100px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
  }
}

@media (max-width: 500px) {
  .responsive-container-block.Container {
    padding-top: 10px;
    padding-right: 0px;
    padding-bottom: 10px;
    padding-left: 0px;
    width: 100%;
    max-width: 100%;
  }

  .mainImg {
    width: 100%;
  }

  .responsive-container-block.bigContainer {
    padding-top: 10px;
    padding-right: 25px;
    padding-bottom: 10px;
    padding-left: 25px;
  }

  .text-blk.subHeadingText {
    font-size: 24px;
    padding-top: 0px;
    padding-right: 0px;
    padding-bottom: 0px;
    padding-left: 0px;
    line-height: 28px;
  }

  .text-blk.description {
    font-size: 16px;
    padding-top: 0px;
    padding-right: 0px;
    padding-bottom: 0px;
    padding-left: 0px;
    line-height: 22px;
  }

  .allText {
    padding-top: 0px;
    padding-right: 0px;
    padding-bottom: 0px;
    padding-left: 0px;
    width: 100%;
  }

  .allText.bottomText {
    margin-top: 50px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
    padding: 0 0 0 0;
    margin: 30px 0 0 0;
  }

  .ultimateImg {
    position: static;
  }

  .purpleBox {
    position: static;
  }

  .stars {
    width: 55%;
  }

  .allText.bottomText {
    margin-top: 75px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
  }

  .responsive-container-block.bigContainer {
    padding-top: 10px;
    padding-right: 20px;
    padding-bottom: 10px;
    padding-left: 20px;
  }

  .purpleText {
    font-size: 16px;
    line-height: 22px;
  }

  .explore {
    padding: 6px 35px 6px 35px;
    font-size: 15px;
  }
}
</style>
<style>

h1,h2,h3 {
    margin: 0;
    font-family: 'IBM Plex Sans',Serif;
}
p {
    margin: 0;
    font-size: 18px;
    line-height: 24px;
}
a {
    color: #f04414;
}
a:hover {
  color: #ffb200;
}
.teamWrapper {
    margin-top: 50px;
}
.container {
  --container: 1160px;
  max-width: var(--container);
  margin: auto;
}
.teamGrid {
    display: grid;
    grid-template-columns: 32.33% 32.33% 32.33%;
    column-gap: 1.5%;
    margin-top: 100px;
}
.avatar {
    position: absolute;
    left: 0;
    right: 0;
    top: -80px;
    text-align: center;
}
.teamcolinner {
    position: relative;
}
.avatar > img {
    width: 150px;
    margin: auto;
    border-radius: 50%;
    border: 1px solid rgb(170 170 173/ 1);
    box-shadow: 0px 3px 10px 3px rgb(170 170 173 / 0.5);
}
.teamcolinner {
    position: relative;
    border: 1px dashed #ddd;
    min-height: 100px;
    background: #fff;
    z-index: 9;
}
.teamcol {
    padding: 15px;
    background: #fff;
    border-radius: 10px;
    position: relative;
    transition: transform 1s ease-in-out;
}
.teamcol:hover {
    transform: translateY(-30px);
    box-shadow: 0px 3px 10px 3px rgb(170 170 173 / 0.5);
    transition: transform 1s ease-in-out;
}
.teamcol:before {
    content: "";
    width: 50%;
    height: 50%;
    position: absolute;
    right: 0;
    top: 0;
    background: -webkit-linear-gradient(#ffbf00, #ffa000);
    border-top-right-radius: 10px;
    transition: width 1s ease-in-out;
}
.teamcol:after {
    content: "";
    width: 50%;
    height: 50%;
    position: absolute;
    left: 0;
    bottom: 0;
    background: -webkit-linear-gradient(#f04414, #f04414);
    border-bottom-left-radius: 10px;
    transition: width 1s ease-in-out;
}
.teamcol:hover::before, .teamcol:hover::after {
    width: 100%;
    transition: width 1s ease-in-out;
}
.member-name {
    margin-top: 80px;
    font-family: oswald;
    font-size: 20px;
    font-weight: bold;
}
.member-info {
    padding: 10px 20px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
.social-listing {
    align-items: center;
    justify-content: center;
    display: flex;
    list-style: none;
    padding: 0;
}
.social-listing >li {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
    background: #f4f5f7;
    border-radius: 50%;
    margin: 5px;
}
</style>
@endsection
