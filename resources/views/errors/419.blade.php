@extends('layouts.auth')

@section('title', 'Techancy - Page expired')

@section('content')
    <div class="row">
        <div class="text-center">
            <h1><span class="bi bi-exclamation-circle"></span></h1>
            <h4><b>Page has expired</b></h4>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">
                <button class="btn btn-dark"><span class="bi bi-arrow-left"></span> <b>Logout</b></button>
            </a>
            <form id="form-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
@endsection