@extends('layouts.auth')

@section('title', 'Techancy - Login')

@section('content')
    <div class="row">
        <div class="col-md-3 col-lg-3 col-xl-4"></div>
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="card border-0 p-4 shadow">
                <div class="d-grid gap-2 mb-1">
                    <div>
                        <div class="d-flex justify-content-center mb-1">
                            <div class="logo">
                                <a href="/">
                                    <img src="{{ asset('img/logo.png') }}" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="text-center">
                            <h6>Welcome!</h6>
                        </div>
                    </div>
                    <a href="{{ route('google.redirect') }}">
                        <div class="d-grid">
                            <button class="btn btn-primary"><span class="bi bi-google"></span> <b>Continue with Google</b></button>
                        </div>
                    </a>
                    <div class="text-center font_13px"> OR LOGIN WITH EMAIL</div>
                </div>
                @livewire('login-form')
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-4"></div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('js/HideShowPassword.min.js') }}"></script>
    <script src="{{ asset('js/hide_show_password.js') }}"></script>
@endsection