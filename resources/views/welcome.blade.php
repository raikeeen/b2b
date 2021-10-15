<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rm automotive - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>


        <!-- Fonts -->
    @include('layouts.stylesheets')

        <!-- Styles -->

    </head>
    <body class="antialiased" id="container">
    <!--<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>-->
    @include('layouts.header')


    <main class="main-container" style="padding-bottom: 2.5rem;">
        <div class="container">
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
