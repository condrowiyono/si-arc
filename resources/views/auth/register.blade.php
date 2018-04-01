
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
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
    <div class="col-12 col-md-6 peer pL-40 pR-120 pT-60 pB-80  h-80 bgc-white scrollable pos-r" style='min-width: 320px;'>
        <h3 class="judul">Selamat Datang di</h3>
        <h3 class="judul font-weight-bold mB-20 c-grey-900">Sistem Informasi Amateur Radio Club</h3>

            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="token" class="text-normal text-dark">Token</label>
                <input id="token" type="text" class="form-control {{ $errors->has('token') ? ' is-invalid' : '' }}" name="token" value="{{ old('token') }}" required autofocus>
                @if ($errors->has('token'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('token') }}</strong>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="name" class="text-normal text-dark">Username</label>
                <input id="name" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="email" class="text-normal text-dark">E-Mail Address</label>
                <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="password" class="text-normal text-dark">Password</label>
                <input id="password" type="password" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="password-confirm" class="text-normal text-dark">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
