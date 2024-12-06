@extends('layouts.auth')

@section('title', 'Verify email address')

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
                            <h6>Verify email address</h6>
                        </div>
                    </div>
                    @if($totalRecordsCount == 0) 
                        <div class="alert alert-warning text-center">
                            Link no longer exist
                        </div>
                    @else
                        <form action="/verify_email_pro/{{ $records[0]->token }}" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="d-grid gap-2">
                                <div>
                                    <input type="email" class="form-control" name="email" value="{{ $records[0]->email }}" autocomplete="off" readonly disabled>
                                </div>
                                <div class="d-grid mt-1">
                                    <button class="btn btn-dark">Verify</button>
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