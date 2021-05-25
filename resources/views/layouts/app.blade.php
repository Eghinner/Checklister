<!doctype html>
<html lang="en">
 <head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- CSRF Token -->
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/favicon-16x16.png')}}">
 <title>{{ config('app.name', 'Laravel') }}</title>
 <!-- Scripts -->
 <script src="{{ asset('js/app.js') }}" defer></script>
 <!-- Fonts -->
 <link rel="dns-prefetch" href="//fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
 <!-- Styles -->
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <!-- CoreUI CSS -->
 <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" integrity="sha512-n+g8P11K/4RFlXnx2/RW1EZK25iYgolW6Qn7I0F96KxJibwATH3OoVCQPh/hzlc4dWAwplglKX8IVNVMWUUdsw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 </head>
 <body class="c-app">
    @include('partials.sidebar')
    {{----}}
    <div class="c-wrapper c-fixed-components">
    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
    <svg class="c-icon c-icon-lg">
    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-menu')}}"></use>
    </svg>
    </button>
    
    <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
    <svg class="c-icon c-icon-lg">
    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-menu')}}"></use>
    </svg>
    </button>
    <ul class="c-header-nav ml-auto mr-4">
    
    <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
    <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/6.jpg" alt="{{Auth::user()->name}}"></div>
    </a>

    </li>
    </ul>

    </header>
    <div class="c-body">
        <main class="c-main">

 @yield('content')

        </main>
    </div>
 {{-- CDN Jquery-Perferct-Scroll --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js" integrity="sha512-yUNtg0k40IvRQNR20bJ4oH6QeQ/mgs9Lsa6V+3qxTj58u2r+JiAYOhOW0o+ijuMmqCtCEg7LZRA+T4t84/ayVA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <!-- Optional JavaScript -->
 <!-- Popper.js first, then CoreUI JS -->
 <script src="https://unpkg.com/@popperjs/core@2"></script>
 <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
 </body>
</html>