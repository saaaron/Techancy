@extends('layouts.dashboard')

@section('title', 'Settings / Jobs / Change job posts currency')

@section('content')    
  <div class="mb-2">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Settings</li>
        <li class="breadcrumb-item active">Jobs</li>
        <li class="breadcrumb-item active" aria-current="page">Change job posts currency</li>
      </ol>
    </nav>
  </div>
  <h4>Change job posts currency</h4>
  <div class="row">
    <p>Change your job posts currency by choosing any of the options below.</p>
    @livewire('change-job-posts-currency-form', ['currency' => auth()->user()->currency])
  </div>
@endsection