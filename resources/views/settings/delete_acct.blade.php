@extends('layouts.dashboard')

@section('title', 'Settings / Account / Delete my account')

@section('content')    
  <div class="mb-2">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Settings</li>
        <li class="breadcrumb-item active">Account</li>
        <li class="breadcrumb-item active" aria-current="page">Delete my account</li>
      </ol>
    </nav>
  </div>
  <h4>Delete my account</h4>
  <div class="row">
    <p>We will send you a link to your email which you will use to delete your account with us.</p>
    @livewire('delete-acct-form')
  </div>
@endsection