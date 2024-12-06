<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Connecting talents with tech opportunities">
	<meta name="author" content="Sa Aaron">
    <title>@yield('title')</title>
    @vite('resources/js/app.js')
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
	<link rel="stylesheet" href="{{ asset('css/Inter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="navbar navbar-expand-sm bg-white d-flex justify-content-between header_shadow fixed-top p-2 ps-sm-5 pe-sm-5">
        <div class="logo">
            <a href="/">
                <img src="{{ asset('img/logo.png') }}" alt="logo">
            </a>
        </div>
        <div class="mr-0">
            <a href="/login">
                <button class="btn btn-dark">Post A Job</button>
            </a>
        </div>
    </header>
    <div>