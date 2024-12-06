@extends('layouts.auth')

@section('title', 'Delete account')

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
                            <h6>Delete account</h6>
                        </div>
                    </div>
                    @if($totalRecordsCount == 0) 
                        <div class="alert alert-warning">
                            Link no longer exist
                        </div>
                    @else
                        <form action="/delete_acct_pro/{{ $records[0]->token }}" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="d-grid gap-2">
                                <div>
                                    <p>Hello {{ $records[0]->user_name }}!</p>
                                    <p>We hate to see you leave but we will also like to let you know that all your data with us which includes your:</p>
                                    <ul>
                                        <li>Profile information</li>
                                        <li>Job posts</li>
                                        <li>Applicants data</li>
                                    </ul>
                                    <p>will be deleted from our database.</p>
                                </div>
                                <div class="d-grid mt-1">
                                    <button type="submit" class="btn btn-dark">Yes, proceed</button>
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