@extends('layouts.main')
@section('contents')
@section('title', 'Contact ')
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
   <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   <!-- end font family -->
   <link rel="stylesheet" href="css/3dslider.css" />
   <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
   <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
   <script src="js/3dslider.js"></script>
   <style>
    .text {
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
</style>



<div style="margin-top: 14%;">

    <div class="text">
        <img src="images/orangecms.jpg" style="width: 100%; height:350px;" alt="">
        <div class="centered">Contact ADCL</div>
    </div>
    {{-- <img src="images/contactpage.png" alt="" width="100%;" height="55%;"> --}}
    <section class="contact" id="contact">
        <div class="container" style="margin-top: -6%;">
            <div class="heading text-center">
                <p>ADCL is a not just a cricket club, ADCL is a society,
                    a band of cricket loving <br> brothers who are Amateur cricketers & yet rubbing shoulders with the top sides around.</p>
            </div>
            <div class="row">
                <div class="col-md-5" style=" background-color:#f04414;">
                    <div class="title" style="margin-left:17px; margin-top:15px;">
                        <h3 style="color: white;">Contact detail</h3>
                        <p style="margin-left: -75px; color:white;">Visit our ADCL Contact Page to get in touch with us.</p>
                    </div>
                    <div class="content" style="color: white;">
                        <!-- Info-1 -->
                        <div class="info">
                            <h4 class="d-inline-block" style="color: white; display: inline-block; margin-left: 18px;">PHONE:</h4>
                                <br>
                                <div style="display: flex;">
                                    <i class="fa-solid fa-phone-volume" style="color: white; font-size: 18px; margin-left:6px; transition: transform 0.3s;"></i>

                                <span style="color: white; margin-left:7px;"><b>Usman Rathore:</b> +971-503964228 | <b>M. Haroon:</b> +971-586677340</span></div>

                        </div>
                        <!-- Info-2 -->
                        <div class="info" style="color: white;">
                            <i class="far fa-envelope" style="color: white; font-size: 18px; transition: transform 0.3s;"></i>
                            <h4 class="d-inline-block" style="color: white; display: inline-block; margin-left: 10px;">EMAIL :
                                <br>
                                <span style="color: white;">enquiry@adcricketlads.com</span>
                            </h4>
                        </div>
                        <!-- Info-3 -->
                        <div class="info" style="color: white;">
                            <i class="fas fa-map-marker-alt" style="color: white; font-size: 18px; transition: transform 0.3s;"></i>
                            <h4 class="d-inline-block" style="color: white; display: inline-block; margin-left: 10px;">ADDRESS :
                                <br>
                                <span style="color: white;">Abu Dhabi, UAE</span>
                            </h4>
                        </div>
                    </div>

                </div>

                <div class="col-md-7">
                    <form>
                        <div class="row">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                        </div>
                        <div class="col-sm-10">
                        <div class="form-group" >
                            <textarea class="form-control" rows="5" id="comment" placeholder="Message" style="width: 104%; margin-left:-15px;"></textarea>
                        </div>
                        <button class="btn btn-block" type="submit">Send Now!</button>
                    </form>
                       </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .contact {
    padding: 130px 0;
}

.contact .heading h2 {
    font-size: 38px;
    font-weight: 700;
    margin: 0;
    padding: 0;
    font-family: Roboto;

}

.contact .heading h2 span {
    color: #f04414;
}

.contact .heading p {
    font-size: 20px;
    font-weight: 400;
    line-height: 1.7;
    color: #999999;
    margin: 20px 0 60px;
    padding: 0;
}

.contact .form-control {
    padding: 25px;
    font-size: 18px;
    margin-bottom: 10px;
    background: #f9f9f9;
    border: 0;
    border-radius: 10px;
}

.contact button.btn {
    padding: 10px;
    border-radius: 10px;
    font-size: 18px;
    background: #f04414;
    color: #ffffff;
    transition: background-color 0.3s;
}


.contact .title h3 {
    font-size: 20px;
    font-weight: 600;
}

.contact .title p {
    font-size: 14px;
    font-weight: 400;
    color: #999;
    line-height: 1.6;
    margin: 0 0 40px;
}

.contact .content .info {
    margin-top: 30px;
}
.contact .content .info i {
    font-size: 30px;
    padding: 0;
    margin: 0;
    color: #02434b;
    margin-right: 20px;
    text-align: center;
    width: 20px;
}
.contact .content .info h4 {
    font-size: 13px;
    line-height: 1.4;
}

.contact .content .info h4 span {
    font-size: 16px;
    font-weight: 300;
    color: #999999;
}
</style>
@endsection
