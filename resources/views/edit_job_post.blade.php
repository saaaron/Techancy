@extends('layouts.dashboard')

@section('title', $title)

@section('content')  
    <div class="row mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../jobs">Jobs</a></li>
                <li class="breadcrumb-item"><a href="../job_post/{{ $unique_id }}">Job post [{{ $unique_id }}]</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <div class="col-md-5 col-lg-5 col-xl-5">
            <h4>Edit Job post</h4>
            <p>Make any changes on job post by updating any of the required form</p>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6">
            @livewire('edit-job-post', ['job_post_id' => $unique_id])
        </div>
        <div class="col-md-1 col-lg-1 col-xl-1"></div>
    </div>
@endsection