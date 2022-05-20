<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="XSRF-TOKEN">
    <meta name="turbo-cache-control" content="no-cache">
    @stack('meta')

    <title>@hasSection('title') @yield('title') - @endif {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="manifest" href="/manifest.json">
    @stack('head')

    <style>
        #page-loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #0d418f;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: .3s all;
        }

        #page-loading .content-section {
            padding: 0 1rem;
            text-align: center;
        }

        #page-loading.page-loading--hidden {
            visibility: hidden;
            opacity: 0;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            const loader = document.querySelector('#page-loading');
            loader.classList.add('page-loading--hidden');
        });
    </script>

    <link rel="stylesheet" href="{{ asset('hito/platform/css/base.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
          integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @stack('css')
    @stack('js')
</head>
<body>
<div id="page-loading" data-turbo-permanent>
    <div class="content-section">
        <i class="fas fa-spinner fa-pulse" style="color: #fff; font-size: 3rem"></i>
    </div>
</div>

@yield('content')

@stack('body')
</body>
</html>
