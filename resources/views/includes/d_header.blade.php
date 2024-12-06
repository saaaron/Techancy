<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Sa Aaron">
  {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
  <title>@yield('title')</title>
  @vite('resources/js/app.js')
  <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/Inter.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
  <style>
    .sidebar .nav-link {
      font-size: inherit;
    }

    .bi {
      height: 1.5rem;
    }
  </style>
</head>
<body id="d_body">
  <header class="navbar sticky-top bg-white flex-md-nowrap p-2 ps-sm-5 pe-sm-5">
    <div class="logo">
      <a class="col-md-3 col-lg-2 me-0 px-3 fs-6" href="/d/home">
        <img src="{{ asset('img/logo.png') }}" alt="logo">
      </a>
    </div>
    <ul class="navbar-nav flex-row">
      <li class="nav-item text-nowrap">
        <div class="dropdown">
          <button class="nav-link px-3 text-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="bi bi-bell icon_size_inc"></div> @livewire('notification-count')
          </button>
          <ul class="dropdown-menu" style="position: absolute;left: -280px;width: 350px;">
            @livewire('notificationResults')
          </ul>
        </div>
      </li>
      <li class="nav-item text-nowrap d-md-none d-lg-block d-lg-none d-xl-block d-xl-none d-xxl-block d-xxl-none">
        <button class="nav-link px-3 text-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="bi bi-list icon_size_inc"></span>
        </button>
      </li>
    </ul>
  </header>
  <div class="container-fluid">
    <div class="row">