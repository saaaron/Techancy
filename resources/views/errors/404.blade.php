@extends('layouts.auth')

@section('title', 'Techancy - Not found')

@section('content')
    <div class="row">
        <div class="text-center">
            <h1><span class="bi bi-exclamation-circle"></span></h1>
            <h4><b>Page not found</b></h4>
            <p class="text-muted">
                The page you are looking for was not found
            </p>
            <a href="/">
                <button class="btn btn-dark"><span class="bi bi-arrow-left"></span> <b>Go back</b></button>
            </a>
        </div>
    </div>
@endsection