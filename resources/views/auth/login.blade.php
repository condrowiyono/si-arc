<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="{{ mix('/css/admin.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <style>
        #loader {
            transition: all 0.2s ease-in-out;
            opacity: 1;
            visibility: visible;
            position: fixed;
            height: 100vh;
            width: 100%;
            background: #fff;
            z-index: 90000;
        }

        #loader.fadeOut {
            opacity: 0;
            visibility: hidden;
        }

        .spinner {
            width: 40px;
            height: 40px;
            position: absolute;
            top: calc(50% - 20px);
            left: calc(50% - 20px);
            background-color: #333;
            border-radius: 100%;
            -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
            animation: sk-scaleout 1.0s infinite ease-in-out;
        }
        .judul {
            line-height: 48px;
            font-size: 36px;
        }

        @-webkit-keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1.0);
                opacity: 0;
            }
        }

        @keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
            }
            100% {
                -webkit-transform: scale(1.0);
                transform: scale(1.0);
                opacity: 0;
            }
        }
    </style>
</head>
<body class="app">
<div id='loader'>
    <div class="spinner"></div>
</div>

<script>
    window.addEventListener('load', () => {
        const loader = document.getElementById('loader');
        setTimeout(() => {
            loader.classList.add('fadeOut');
        }, 200);
    });
</script>
<div class="peers ai-s fxw-nw h-100vh">
    <div class="peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv"
         style='background-color: #f9fafb;'>
        <div class="pos-a centerXY">
            <div class="bgc-white bdrs-50p pos-r" style='width: 200px; height: 200px;'>
                <img class="pos-a centerXY" src="/assets/static/images/logo-biru.png" alt="">
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 peer pL-40 pR-120 pY-80 h-100 bgc-white scrollable pos-r" style='min-width: 320px;'>
        <h3 class="judul">Selamat Datang di</h3>
        <h3 class="judul font-weight-bold mB-20 c-grey-900">Sistem Informasi Amateur Radio Club</h3>

        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="email" class="text-normal text-dark">E-Mail Address</label>
                <input id="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="text-normal text-dark">Password</label>
                <input id="password" type="password" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                @endif
            </div>
            
            <div class="form-group">
                <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                    <input type="checkbox" id="inputCall1" name="remember" class="peer" {{ old('remember') ? 'checked' : '' }} >
                    <label for="inputCall1" class="peers peer-greed js-sb ai-c">
                        <span class="peer peer-greed">Remember Me</span>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Lupa password
                </a>
                 <button type="submit" class="btn btn-primary pull-right">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
