@extends('layouts.auth')

@section('title', 'Techancy - Forgot password')

@section('content')
    <div class="row">
        <div class="col-md-3 col-lg-3 col-xl-4"></div>
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="card border-0 p-4 shadow">
                <div class="d-grid gap-2">
                    <div>
                        <div class="d-flex justify-content-center mb-1">
                            <div class="logo">
                                <a href="/">
                                    <img src="{{ asset('img/logo.png') }}" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="text-center">
                            <h6>Forgot password</h6>
                        </div>
                    </div>
                    <div class="text_justify">
                        A link will be sent to your registered email address to reset your password.
                    </div>
                </div>
                @livewire('forgot-password-form')
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-4"></div>
    </div>
@endsection