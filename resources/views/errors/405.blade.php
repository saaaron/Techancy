@extends('layouts.auth')

@section('title', 'Techancy - Method not allowed')

@section('content')
    <div class="row">
        <div class="text-center">
            <h1><span class="bi bi-exclamation-circle"></span></h1>
            <h4><b>Method not allowed</b></h4>
            <p class="text-muted">
                We are sorry, the method you are trying to perform is not allowed
            </p>
            <a href="/">
                <button class="btn btn-dark"><span class="bi bi-arrow-left"></span> <b>Go back</b></button>
            </a>
        </div>
    </div>
@endsection