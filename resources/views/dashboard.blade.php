@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')    
  <h4>Hello {{ auth()->user()->name }}!</h4>
  <div class="row mb-3">
    <div class="col-md-6 col-lg-6 col-xl-6 mb-2">
      <div class="card p-3">
        <b class="text-muted font_13px">
          Total jobs
        </b>
        <h1>
          <b>{{ $totalJobPosts }}</b>
        </h1>
      </div>
    </div>
    <div class="col-md-6 col-lg-6 col-xl-6">
      <div class="card p-3">
        <b class="text-muted font_13px">
          Total applicants
        </b>
        <h1>
          <b>{{ $totalApplicants }}</b>
        </h1>
      </div>
    </div>
  </div>
  <div class="mb-4">
    <div class="d-flex justify-content-between mb-2">
      <div><h5>Recent jobs</h5></div>
      <div>
        <a href="/d/post_a_job"><button class="btn btn-dark btn-sm">Post A Job</button></a>
      </div>
    </div>
    @livewire('recent-jobs')
  </div>
@endsection