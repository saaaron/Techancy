@extends('layouts.pages')

@section('title', 'Techancy - Frequently Asked Questions (FAQ)')

@section('content')
    <div class="col-md-9 col-lg-9 col-xl-9">
        <h4>Frequently Asked Questions (FAQ)</h4>
        @livewire("faq")
    </div>
@endsection