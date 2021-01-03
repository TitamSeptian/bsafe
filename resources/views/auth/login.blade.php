<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bsafe - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Septian Dwi Putra">
    <meta name="description" content="Website edukasi untuk para sopir sebelum terjun ke  lapangan">
    {{--
    <link rel="shortcut icon" href="{{ asset ('css/vendor/bootstrap/bootstrap-grid.min.css') }}" /> --}}
    <!-- <link rel="shortcut icon" href="{{ asset ('img/favico.png') }}" /> -->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/bootstrap/bootstrap.min.css') }}">
</head>

<body>
    <div class="container-login">
        <div class="left">
            <div class="caption">
                <a href="javascript:void(0)">
                    <img src="{{ asset ('assets/img/logo/white.png') }}">
                    <h1>bsafe</h1>
                </a>
                <p>
                    Sebuah aplikasi edukasi berbasis web yang berisi informasi-informasi berkendara dengan baik yang ditargetkan untuk para pengemudi bus sopir yang baik adalah sopir yang memahami tentang karirnya. Tingkatkan pemahaman anda melalui bsafe
                </p>
            </div>
        </div>
        <div class="right">
            <div class="content">
                <h1><span>LO</span>G IN</h1>
                @include("partials.msg")
                <form method="POST" action="{{ route('post-login') }}">
                    @csrf
                    <input type="text" placeholder="Username" class="@error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="off" autofocus>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <button type="submit">
                        Sign In
                    </button>
                </form>
                <div class="bottom-right">
                    <!-- <img src="{{ asset ('img/master-svg/pat.svg') }}" alt=""> -->
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</html>
