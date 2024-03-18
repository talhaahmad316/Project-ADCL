<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADCL | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="icon" href="https://www.adcricketlads.com/wp-content/uploads/2021/09/transparent-ADCL-Logo.png"
        type="image/png">
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/adminlte.min.css') }}">
    <!-- jQuery -->
    <script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin-assets/dist/js/adminlte.min.js') }}"></script>
<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.miminn.css">
<link rel="icon" href="{{ asset('images/logo/logo.png') }}" type="image/png">

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body class="hold-transition login-page">
    <div class="login-box" style="margin-bottom: 10%;">
        <div class="login-logo">
            <a href="#"><b>UCL <br>STATISTICS SYSTEM</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <img src="{{ asset('images/logo/ucl_logo.png') }}" style="height: 130px; margin-left: 110px;"
                    alt="ADCL Logo">
                    @if (session('success'))
                    <script>
                        $(document).ready(function () {
                            toastr.success('{{ session('success') }}', 'Success', {
                                closeButton: true,
                                progressBar: true,
                                positionClass: 'toast-top-right',
                                timeOut: 3000, // 3 seconds
                            });
                        });
                    </script>
                @endif
                
                @if (session('error'))
                    <script>
                        $(document).ready(function () {
                            toastr.error('{{ session('error') }}', 'Error', {
                                closeButton: true,
                                progressBar: true,
                                positionClass: 'toast-top-right',
                                timeOut: 3000, // 3 seconds
                            });
                        });
                    </script>
                @endif
                <p class="login-box-msg" style="font-size: 22px;">Login</p>

                <form action="{{ route('postLogin') }}" method="post">
                    @csrf
                    <div class="mb-1 input-group">
                        <input name="email" type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-1 input-group">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input name="remember" type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
    </div>
    <!-- /.login-box -->
</body>

</html>
