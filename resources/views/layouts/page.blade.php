<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Antonio Comique</title>
        <link rel="stylesheet" href="{{url('/')}}/css/bootstarp4.css">
        <script src="{{url('/')}}/js/app.js"></script>
    </head>
    <body>
    @include('inc.page_header')
    <div class="container">
        @yield('content')
    </div>
    @include('inc.page_footer')
    </body>
</html>
