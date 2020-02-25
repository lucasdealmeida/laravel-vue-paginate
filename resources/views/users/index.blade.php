<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine-ie11.js" defer></script>

</head>
<body>

<div id="app">
    <main class="py-4 mb-2">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Users
                    <a href="{{ url('teste') }}">Teste</a>
                </div>



                <div class="card-body">

{{--                    <div>--}}
{{--                        <ajax template="@include('users.select_box')"></ajax>--}}
{{--                    </div>--}}

                    <ajax template='@include('users.partial')'></ajax>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
