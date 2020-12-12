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
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                </p>
            </div>
        </div>
        <div class="right">
            <div class="content">
                <h1><span>SI</span>GN IN</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="email" placeholder="Email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
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

</html>
