@extends('layouts.dashboard')

@section('title', 'Settings / Account / Change email address')

@section('content')    
  <div class="mb-2">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Settings</li>
        <li class="breadcrumb-item active">Account</li>
        <li class="breadcrumb-item active" aria-current="page">Change email address</li>
      </ol>
    </nav>
  </div>
  <h4>Change email address</h4>
  <div class="row">
    <p>We will send you a link to your email which you will use to change your email address.</p>
    @livewire('change-email-addr-form')
  </div>
@endsection