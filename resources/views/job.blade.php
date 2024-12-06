@extends('layouts.home')

@section('title', $title)

@section('content')
    <div class="container" style="margin-top: 5rem;">
            @if ($totalRecordsCount == 0)
                <div class="row mb-5">
                    <div class="text-center">
                        <h1><span class="bi bi-exclamation-circle"></span></h1>
                        <h4><b>Ops!</b></h4>
                        <p class="text-muted">
                            The job post you are looking for was not found
                        </p>
                        <a href="{{ url()->previous() }}">
                            <button class="btn btn-dark"><span class="bi bi-arrow-left"></span> <b>Go back</b></button>
                        </a>
                    </div>
                </div>
            @else
                @foreach ($jobPostQuery as $jobPost)
                    <div class="row mb-5">
                        <div class="mb-2">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Job post [{{ $jobPost->unique_id }}]</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-8 col-lg-8 col-xl-8 d-grid gap-2 mb-3">
                            <div class="card border-0">
                                <div class="d-flex justify-content-start mb-3 font_13px">
                                    <div class="md_profile_photo_prev">
                                        <img src="{{ asset('storage/' . $jobPost->user_image) }}" alt="profile photo">
                                    </div>
                                    <div class="mt-3"><b>{{ $jobPost->user_name }}</b></div>
                                    <div class="mt-3 ms-auto" id="time">
                                        <div class="text-muted"><b>{{ $jobPost->created_at->diffForHumans() }}</b></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h3>
                                        <b>
                                            @if ($jobPost->role == "ai")
                                                Artificial Intelligence
                                            @elseif ($jobPost->role == "backend_dev")
                                                Back-End Development
                                            @elseif ($jobPost->role == "blockchain_dev")
                                                Blockchain Development
                                            @elseif ($jobPost->role == "cloud_comp")
                                                Cloud Computing
                                            @elseif ($jobPost->role == "cyber_sec")
                                                Cybersecurity
                                            @elseif ($jobPost->role == "data_sci_n_analytics")
                                                Data Science & Analytics
                                            @elseif ($jobPost->role == "devops_n_sre")
                                                DevOps & Site Reliability Engineering (SRE)
                                            @elseif ($jobPost->role == "frontend_dev")
                                                Front-End Development
                                            @elseif ($jobPost->role == "fullstack_dev")
                                                Full-Stack Development
                                            @elseif ($jobPost->role == "game_dev")
                                                Game Development
                                            @elseif ($jobPost->role == "it_support_n_helpd")
                                                IT Support & Helpdesk
                                            @elseif ($jobPost->role == "mac_learning_engr")
                                                Machine Learning Engineering
                                            @elseif ($jobPost->role == "mobile_app_dev")
                                                Mobile App Development
                                            @elseif ($jobPost->role == "net_engr")
                                                Network Engineering
                                            @elseif ($jobPost->role == "prod_mgt")
                                                Product Management
                                            @elseif ($jobPost->role == "qa_test_n_auto")
                                                QA Testing & Automation
                                            @elseif ($jobPost->role == "software_engr")
                                                Software Engineering
                                            @elseif ($jobPost->role == "systems_admin")
                                                Systems Administration
                                            @elseif ($jobPost->role == "uiux_design")
                                                UI/UX Design
                                            @elseif ($jobPost->role == "web_dev")
                                                Web Development
                                            @endif
                                        </b>
                                    </h3>
                                    <span class="badge bg-primary p-2">{{ ucwords($jobPost->level) }} level</span>
                                    <span class="badge bg-secondary p-2">{{ ucwords($jobPost->type) }}</span>
                                </div>
                                <div>
                                    <p>
                                        {!! nl2br(e($jobPost->description)) !!}
                                    </p>
                                </div>
                                <div class="font_13px"><b>{{ $jobPost->views }}</b> views</div>
                                <div class="font_13px">
                                    <b>{{ $jobPost->applicants_applied }}</b> applied, <b>{{ $jobPost->applicants }}</b> needed
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <div class="font_13px">
                                        <div>
                                            <b>
                                                @if ($jobPost->user_currency == "NGN")
                                                    ₦
                                                @elseif ($jobPost->user_currency == "USD")
                                                    $
                                                @elseif ($jobPost->user_currency == "POUND")
                                                    £
                                                @elseif ($jobPost->user_currency == "EURO")
                                                    €
                                                @elseif ($jobPost->user_currency == "YEN")
                                                    ¥
                                                @endif
                                                {{ number_format($jobPost->payment) }}/{{ $jobPost->payment_day }}
                                            </b>
                                        </div>
                                        <div class="text-muted">{{ ucwords($jobPost->user_location) }}</div>
                                    </div>
                                    @if ($jobPost->applicants_applied == $jobPost->applicants) 
                                        <div class="mr-0">
                                            <button class="btn btn-dark" disabled><span class="bi-exclamation-triangle"></span> Closed</button>
                                        </div>
                                    @else
                                        <div class="mr-0">
                                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#apply_job_modal">Apply now</button>
                                        </div>
                                    @endif

                                    <div class="modal fade" id="apply_job_modal">
                                        <div class="modal-dialog modal-fullscreen-sm-down">
                                            <div class="modal-content">
                                                <div class="modal-header p-2 pe-2 ps-2">
                                                    <h6 class="modal-title" style="font-family: Inter Bold">Apply now</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @livewire('job-post-apply-now-form', ['job_post_id' => $jobPost->unique_id, 'by_user_id' => $jobPost->by_user, 'by_user_name' => $jobPost->user_name])
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div id="sticky_filter" class="card p-3 border-0" style="background-color: #eee">
                                <div class="mb-3">
                                    <h6><b>Share job post</b></h6>
                                    <div class="d-grid gap-2">
                                        <div class="d-grid">
                                            <button class="btn btn-dark"><span class="bi bi-twitter-x"></span></button>
                                        </div>
                                        <div class="d-grid">
                                            <button class="btn btn-success"><span class="bi bi-whatsapp"></span> <b>Whatsapp</b></button>
                                        </div>
                                        <div class="d-grid">
                                            <button class="btn btn-primary"><span class="bi bi-facebook"></span> <b>Facebook</b></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
    </div>
@endsection