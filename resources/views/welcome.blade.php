<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-66802263-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-66802263-1');
        </script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:site_name" content="Rm automotive">
        <meta property="og:url" content="https://www.rm-autodalys.eu">
        <meta property="og:type" content="website">
        <link rel="icon" href="{{asset('storage/images/favicon.ico')}}">

        <title>Rm automotive - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>


        <!-- Fonts -->
    @include('layouts.stylesheets')

        <!-- Styles -->

    </head>
    <body class="antialiased" id="container">

    @include('layouts.header')

    <main class="main-container" style="padding-bottom: 2.5rem; padding-top: 8rem;">
        <div class="container container-width-m">
            @include('layouts.errors')
            {{--<div id="app">--}}
            @yield('content')
            {{--</div>--}}


        </div>
    </main>

    @include('layouts.footer')
    @include('layouts.javascript')
    </body>
</html>
