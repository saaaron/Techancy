@extends('layouts.dashboard')

@section('title', 'Frequently Asked Questions (FAQ)')

@section('content')  
    <div class="d-flex justify-content-between mb-2">
        <h4>Frequently Asked Questions (FAQ)</h4>
    </div>
    @livewire('d-faq')
@endsection