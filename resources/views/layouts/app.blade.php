<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />

    <script src="{{ asset('js/app.js') }}"></script>
    <livewire:styles/>
</head>
<body>
<div id="app">
    <div class="row justify-content-md-center mt-lg-5">
        <div class="col col-lg-4">
            @yield('content')
        </div>
    </div>

</div>

<livewire:scripts/>

</body>
</html>
