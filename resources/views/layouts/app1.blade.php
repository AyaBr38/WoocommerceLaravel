<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ecommerce</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/app.css')}}"> 
    </head>
    <body style="background-image:url({{url('img/bfg.jpg')}});background-position: center center;background-repeat: no-repeat;background-size: cover;height: 100%;width: 100%;">
        @include('inc.navbar1')
        <div class="container">
    @yield('content')
        </div>
    </body>
</html>