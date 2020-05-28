<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"/>

    <script src="{{ asset('js/styles.js') }}"></script>
    <livewire:styles/>
</head>

<body>
<div id="app">
    <div class="row justify-content-md-center mt-lg-5">
        <div class="col col-lg-4">
            @yield('content')
            <br/>
            <div class="card">
                <div class="card-body text-center">
                    <strong>BETA 0.1.4</strong>
                    <br/>
                    Made with <span class="text-danger">
                        ❤
                    </span> by <a href="https://github.com/AidasPa" target="_blank">AidasP</a>.
                </div>
            </div>
        </div>
    </div>
</div>

@yield('scripts')

<livewire:scripts/>

</body>
</html>
