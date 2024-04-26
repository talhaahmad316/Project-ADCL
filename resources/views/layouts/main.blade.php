<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Site Metas -->
<title> @yield('title')</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- Site Icons -->
<link rel="shortcut icon" href="" type="image/x-icon" />
<link rel="apple-touch-icon" href="">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<!-- Site CSS -->
<link rel="stylesheet" href="{{ asset('asset/style.css') }}">
<!-- Colors CSS -->
<link rel="stylesheet" href="{{ asset('css/colors.css') }}">
<!-- ALL VERSION CSS -->
<link rel="stylesheet" href="{{ asset('css/versions.css') }}">
<!-- Responsive CSS -->
<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<!-- font family -->
<link
    href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
<!-- end font family -->
<link rel="stylesheet" href="{{ asset('css/3dslider.css') }}" />
<link rel="icon" href="https://www.adcricketlads.com/wp-content/uploads/2021/09/transparent-ADCL-Logo.png"
    type="image/png">

<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('asset/style.css') }}">
<link
    href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500&family=IBM+Plex+Serif:wght@300;400&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('gird-practise.css') }}" />
</head>

<body>
    <div>

        @include('partials/_navbar')
        <div>
            <br><br>
            <div>
                @yield('contents')
            </div>
            <div>
                @include('partials/_footer')
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
            <script src="js/3dslider.js"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</body>