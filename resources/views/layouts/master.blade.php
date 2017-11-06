<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Campus Confess') }}</title>

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">

    <link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">
    
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <!-- <div id="app"> -->
        @include('layouts.partials._navigation')

        @yield('content')
    <!-- </div> -->
        @include('layouts.partials._footer')

</body>
</html>
