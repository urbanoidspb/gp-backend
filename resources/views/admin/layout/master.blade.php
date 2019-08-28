<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('_adm/css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('_adm/css/main.css') }}">
    @stack('head')
    <title>Админ панель - @yield('title')</title>
</head>
<body>

@auth
@include('admin.layout.header')
@endauth

<main>
    <section>
        <div class="container">
            @yield('content')
        </div>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/{{ config('services.tinymce.api-key') }}/tinymce/5/tinymce.min.js"
        ></script>
<script src="{{ asset('_adm/js/materialize.min.js') }}"></script>
<script src="{{ asset('_adm/js/main.js') }}"></script>
@stack('scripts')
</body>
</html>