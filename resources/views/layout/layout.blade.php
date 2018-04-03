<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{  mix('/css/admin.css') }}">
    <style>
        #loader {
            transition: all 0.3s ease-in-out;
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
        .btn-default {
            border: solid 1px rgba(0, 0, 0, 0.12);
            background-color: transparent;
            border-radius: 3px;
        }
        .btn-default .fa{
            color: rgba(0, 0, 0, 0.44);
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
        .tag {
            display: inline-block;
            padding: 0.4em;
            font-size: 100%;
            font-weight: 400;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
            margin: 0.25em;
            background-color: rgba(0, 122, 255, 0.2);
            border: solid 1px rgba(0, 122, 255, 0.4);
        }
        .bias-input-group .input-group-addon + .input-group-btn > .btn {border-radius: 0;}
        .bias-input-group .input-group-addon + .input-group-btn + .input-group-addon {border-right: 0; border-left: 0;}
        .datepicker {
            z-index: 10000!important;
        }

        .table-action {
            min-width: 120px;

        }

        @-webkit-keyframes sk-scaleout {
            0% { -webkit-transform: scale(0) }
            100% {
                -webkit-transform: scale(1.0);
                opacity: 0;
            }
        }

        @keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
            } 100% {
                  -webkit-transform: scale(1.0);
                  transform: scale(1.0);
                  opacity: 0;
              }
        }
    </style>
</head>
<body class="app">
<!-- @TOC -->
<!-- =================================================== -->
<!--
  + @Page Loader
  + @App Content
      - #Left Sidebar
          > $Sidebar Header
          > $Sidebar Menu

      - #Main
          > $Topbar
          > $App Screen Content
-->

<!-- @Page Loader -->
<!-- =================================================== -->
<div id='loader'>
    <div class="spinner"></div>
</div>

<script>
    window.addEventListener('load', () => {
        const loader = document.getElementById('loader');
        setTimeout(() => {
            loader.classList.add('fadeOut');
        }, 100);
    });
</script>

<!-- @App Content -->
<!-- =================================================== -->
<div>
    <!-- #Left Sidebar ==================== -->
    @include('layout.sideBar')

    <!-- #Main ============================ -->
    <div class="page-container">
        <!-- ### $Topbar ### -->
        @include('layout.topBar')

        <!-- ### $App Screen Content ### -->
        <main class='main-content bgc-grey-100'>
            <div id='mainContent'>
                @yield('mainContent')
            </div>
        </main>

        <!-- ### $App Screen Footer ### -->
        @include('layout.footer')
    </div>
</div>
<script src="{{ mix('/js/admin.js') }}"></script>
@yield('page-script')
</body>
</html>
