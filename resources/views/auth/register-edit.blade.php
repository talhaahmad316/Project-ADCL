<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADCL | Register</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="icon" href="https://www.adcricketlads.com/wp-content/uploads/2021/09/transparent-ADCL-Logo.png" type="image/png">
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/adminlte.min.css') }}">
    <!-- jQuery -->
    <script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin-assets/dist/js/adminlte.min.js') }}"></script>
    <!-- Favicon -->
<link rel="icon" href="{{ asset('images/logo/logo.png') }}" type="image/png">

</head>

<body class="hold-transition login-page">
    <div class="login-box" style="margin-bottom: 10%;">
        <div class="login-logo">
            <a href="#"><b>ADCL <br>STATISTICS SYSTEM</b></a>
        </div>
        <!-- /.Register-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <img src="{{ asset('images/logo/logo.png') }}" style="height: 130px; margin-left: 110px;"
                    alt="ADCL Logo">
                @if (session('error'))
                    <div class="text-center text-danger">{{ session('error') }}</div>
                @endif
                @if (session('success'))
                    <div class="text-center text-success">{{ session('success') }}</div>
                @endif
                <p class="login-box-msg" style="font-size: 22px;">Edit Form</p>

                <form action="{{ route('user-update', $users->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-1 input-group">
                        <input name="name" type="text" class="form-control" placeholder="Name" required
                            value="{{ old('name', $users->name) }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-1 input-group">
                        <input name="email" type="email" class="form-control" placeholder="Email" required
                            value="{{ old('email', $users->email) }}">
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
                        <input name="password" type="password" class="form-control" placeholder="Password"   value="{{ old('password', $users->password) }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-1 input-group">
                        <label for="role" class="form-label">Role</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="role">Choose</label>
                            </div>
                            <select id="role" name="role" class="custom-select" required autofocus>
                                <option value="1" @if (old('role', $users->role) == '1') selected @endif>Super Admin</option>
                                <option value="2" @if (old('role', $users->role) == '2') selected @endif>Admin</option>
                                <option value="3" @if (old('role', $users->role) == '3') selected @endif>User</option>
                            </select>
                        </div>
                        @error('role')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-primary btn-block" type="submit">Update</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-primary btn-block">
                                <a href="{{ route('getLogin') }}" style="color: white; text-decoration: none;">Back to
                                    Login</a>
                            </button>
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