@extends('layouts.dashboard')

@section('title', 'Jobs')

@section('content')  
    <div class="d-flex justify-content-between mb-2">
        <h4>Jobs ({{ $totalJobPosts }})</h4>
        <div>
            <a href="/d/post_a_job"><button class="btn btn-dark btn-sm">Post A Job</button></a>
        </div>
    </div>
    @if(session()->has('delete_msg'))
        <div class="text-success">
            {{session()->get('delete_msg')}}
        </div>
    @endif
    @livewire('jobs')
@endsection