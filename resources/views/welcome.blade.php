@section('title', 'Ahamori')

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Confesser</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<div id="app">

@include('layouts.partials._navigation')

<div class="container">
    <div class="row">
        
        <a href="{{ route('login') }}" class="btn btn-primary">login </a>
                       
        <div class="pull-right">
                <a href="{{ route('register') }}" class="btn btn-primary ">Register </a>
        </div> 
    </div>
</div>
@extends('layouts.partials._footer')

</div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>