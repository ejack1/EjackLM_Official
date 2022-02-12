<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body
        {
            background-image: url({{asset('Admin/dist/images/newb.jpeg')}}) ;
            background-repeat:no-repeat;
            background-size:cover;

            background-attachment:fixed;
        }
        .card{

margin-top: auto;
margin-bottom: auto;

/* background-color: rgba(0,0,0,0.5) !important; */
background-color: rgba(214, 214, 214, 0.5) !important;
}

        /* body
        {


        } */
    </style>
</head>
<body >
    <div id="app" >


        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>
