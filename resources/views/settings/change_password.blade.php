@extends('layouts.dashboard')

@section('title', 'Settings / Account / Change password')

@section('content')    
  <div class="mb-2">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Settings</li>
        <li class="breadcrumb-item active">Account</li>
        <li class="breadcrumb-item active" aria-current="page">Change password</li>
      </ol>
    </nav>
  </div>
  <h4>Change password</h4>
  <div class="row">
    <p>Change your account password by entering a new password below.</p>
    @livewire('change-password-form')
  </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('js/HideShowPassword.min.js') }}"></script>
    <script src="{{ asset('js/hide_show_password.js') }}"></script>
@endsection