@extends('layouts.pages')

@section('title', 'Techancy - About')

@section('content')
    <div class="col-md-9 col-lg-9 col-xl-9">
        <h4>About</h4>
        @livewire("about-us")
    </div>
@endsection