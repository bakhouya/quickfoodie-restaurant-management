<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('storage/'.langHelper::settings()->icon)}}" />
    <meta name="description" content="{{langHelper::settings()->seoDescription}}" >
    <meta name="keywords" content="{{ langHelper::settings()->seoDescription }}" >
    <meta name="email" content="{{langHelper::settings()->email}}" >
    <meta name="telephone" content="+212{{langHelper::settings()->phone}}" >
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <title> @yield('title', langHelper::settings()->seoName) </title>    


    <link rel="stylesheet" href="{{asset("assets/css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/owl.theme.default.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/uicons.css")}}">
    @livewireStyles
    @vite('resources/sass/app.scss')  
</head>
{{-- darkGreen grey--}}
<body class="dark_3 bluetest" 
        @if (app()->getLocale() == "ar") dir="rtl" @else dir="ltr" @endif>

  
   
    



  