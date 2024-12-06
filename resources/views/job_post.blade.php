@extends('layouts.dashboard')

@section('title', $title)

@section('content') 
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../jobs">Jobs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Job post [{{ $jobPost[0]->unique_id }}]</li>
        </ol>
    </nav>
    <h4>Job post</h4>
    <div class="row mb-4">
        <div class="col-md-6 col-lg-6 col-xl-6 d-grid gap-2 mb-3">
            <div class="card border-0">
                <div class="d-flex justify-content-start mb-3 font_13px">
                    <div class="md_profile_photo_prev">
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="profile photo">
                    </div>
                    <div class="mt-3"><b>By you</b></div>
                    <div class="mt-3 ms-auto">
                        <div class="text-muted"><b>{{ $jobPost[0]->created_at->diffForHumans() }}</b></div>
                    </div>
                </div>
                <div class="mb-3">
                    <h3><b>
                        @if ($jobPost[0]->role == "ai")
                                Artificial Intelligence
                            @elseif ($jobPost[0]->role == "backend_dev")
                                Back-End Development
                            @elseif ($jobPost[0]->role == "blockchain_dev")
                                Blockchain Development
                            @elseif ($jobPost[0]->role == "cloud_comp")
                                Cloud Computing
                            @elseif ($jobPost[0]->role == "cyber_sec")
                                Cybersecurity
                            @elseif ($jobPost[0]->role == "data_sci_n_analytics")
                                Data Science & Analytics
                            @elseif ($jobPost[0]->role == "devops_n_sre")
                                DevOps & Site Reliability Engineering (SRE)
                            @elseif ($jobPost[0]->role == "frontend_dev")
                                Front-End Development
                            @elseif ($jobPost[0]->role == "fullstack_dev")
                                Full-Stack Development
                            @elseif ($jobPost[0]->role == "game_dev")
                                Game Development
                            @elseif ($jobPost[0]->role == "it_support_n_helpd")
                                IT Support & Helpdesk
                            @elseif ($jobPost[0]->role == "mac_learning_engr")
                                Machine Learning Engineering
                            @elseif ($jobPost[0]->role == "mobile_app_dev")
                                Mobile App Development
                            @elseif ($jobPost[0]->role == "net_engr")
                                Network Engineering
                            @elseif ($jobPost[0]->role == "prod_mgt")
                                Product Management
                            @elseif ($jobPost[0]->role == "qa_test_n_auto")
                                QA Testing & Automation
                            @elseif ($jobPost[0]->role == "software_engr")
                                Software Engineering
                            @elseif ($jobPost[0]->role == "systems_admin")
                                Systems Administration
                            @elseif ($jobPost[0]->role == "uiux_design")
                                UI/UX Design
                            @elseif ($jobPost[0]->role == "web_dev")
                                Web Development
                            @endif
                    </b></h3>
                    <span class="badge bg-primary p-2">{{ ucwords($jobPost[0]->level) }} level</span>
                    <span class="badge bg-secondary p-2">{{ ucwords($jobPost[0]->type) }}</span>
                </div>
                <div>
                    <p>
                        {!! nl2br(e($jobPost[0]->description)) !!}
                    </p>
                </div>
                <div class="font_13px"><b>{{ $jobPost[0]->views }}</b> views</div>
                <div class="font_13px">
                    <b>{{ $jobPost[0]->applicants_applied }}</b> applied, <b>{{ $jobPost[0]->applicants }}</b> needed
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <div class="font_13px">
                        <div>
                            <b>
                                @if (Auth::user()->currency == "NGN")
                                    ₦
                                @elseif (Auth::user()->currency == "USD")
                                    $
                                @elseif (Auth::user()->currency == "POUND")
                                    £
                                @elseif (Auth::user()->currency == "EURO")
                                    €
                                @elseif (Auth::user()->currency == "YEN")
                                    ¥
                                @endif
                                {{ number_format($jobPost[0]->payment) }}/{{ $jobPost[0]->payment_day }}
                            </b>
                        </div>
                        <div class="text-muted">{{ ucwords(Auth::user()->location) }}</div>
                    </div>
                    <div class="mr-0">
                        <a href="/d/edit_job_post/{{ $jobPost[0]->unique_id }}">
                            <button class="btn btn-secondary"><span class="bi bi-pen"></span>  Edit</button>
                        </a>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal"><span class="bi bi-trash"></span>  Delete</button>
                        
                        {{-- delete job post modal --}}
                        <div class="modal fade" id="delete_modal">
                            <div class="modal-dialog">
                                <div class="modal-content rounded-3 shadow">
                                    <div class="modal-body p-4 text-center">
                                        <h5 class="mb-0"><b>Are you sure?</b></h5>
                                        <p class="mb-0">The current job post will be deleted and you will lose all data of applicants.</p>
                                    </div>
                                    <div class="modal-footer flex-nowrap p-0">
                                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end" data-bs-dismiss="modal">No thanks</button>
                                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0"><a href="/d/delete_job_post/{{ $jobPost[0]->unique_id }}">Yes, proceed</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6">
            @livewire('job-post-applicants', ['job_post_id' => $jobPost[0]->unique_id])
        </div>
    </div>
@endsection