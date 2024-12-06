@extends('layouts.auth')

@section('title', 'Reset password')

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
                            <h6>Reset password</h6>
                        </div>
                    </div>
                    @if($totalRecordsCount == 0) 
                        <div class="alert alert-warning">
                            Link no longer exist
                        </div>
                    @else
                        <form action="/reset_password_pro/{{ $records[0]->token }}" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="d-grid gap-2">
                                <div>
                                    <label for="password" class="font_13px">New password</label>
                                    <input type="password" id="password" class="form-control" name="password" autocomplete="off" required>
                                    @error('password')
                                        <div class="text-danger font_13px">{{ $message }}</div>
                                    @enderror
                                    @if (session()->has('reset_pass_msg'))
                                        <div class="text-danger font_13px">{{ session()->get('reset_pass_msg') }}</div>
                                    @endif
                                </div>
                                <div class="d-grid mt-1">
                                    <button class="btn btn-dark">Done</button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
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