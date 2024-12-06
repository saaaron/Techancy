<div class="row">
    @if($totalRecordsCount == 0) 
        <div class="text-muted p-5">
            <div class="text-center">
                <h1>
                    <span class="bi-info-circle-fill"></span>
                </h1>
                <p>Nothing yet!</p>
            </div>
        </div>
    @else
        @foreach ($jobs as $job)
            <div class="col-lg-4 col-xl-4 mb-3">
                <div class="card p-3 @if ($job->applicants_applied == $job->applicants) bg-body-tertiary @endif">
                    <div class="d-flex justify-content-start mb-3 font_13px">
                        <div class="sm_profile_photo_prev">
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="profile photo">
                        </div>
                        <div class="mt-2"><b>By you</b></div>
                        <div class="mt-2 ms-auto">
                            <div class="text-muted"><b>{{ $job->created_at->diffForHumans() }}</b></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h5><b>
                            @if ($job->role == "ai")
                                Artificial Intelligence
                            @elseif ($job->role == "backend_dev")
                                Back-End Development
                            @elseif ($job->role == "blockchain_dev")
                                Blockchain Development
                            @elseif ($job->role == "cloud_comp")
                                Cloud Computing
                            @elseif ($job->role == "cyber_sec")
                                Cybersecurity
                            @elseif ($job->role == "data_sci_n_analytics")
                                Data Science & Analytics
                            @elseif ($job->role == "devops_n_sre")
                                DevOps & SRE
                            @elseif ($job->role == "frontend_dev")
                                Front-End Development
                            @elseif ($job->role == "fullstack_dev")
                                Full-Stack Development
                            @elseif ($job->role == "game_dev")
                                Game Development
                            @elseif ($job->role == "it_support_n_helpd")
                                IT Support & Helpdesk
                            @elseif ($job->role == "mac_learning_engr")
                                Machine Learning Engineering
                            @elseif ($job->role == "mobile_app_dev")
                                Mobile App Development
                            @elseif ($job->role == "net_engr")
                                Network Engineering
                            @elseif ($job->role == "prod_mgt")
                                Product Management
                            @elseif ($job->role == "qa_test_n_auto")
                                QA Testing & Automation
                            @elseif ($job->role == "software_engr")
                                Software Engineering
                            @elseif ($job->role == "systems_admin")
                                Systems Administration
                            @elseif ($job->role == "uiux_design")
                                UI/UX Design
                            @elseif ($job->role == "web_dev")
                                Web Development
                            @endif
                        </b></h5>
                        <span class="badge bg-primary p-2">{{ ucwords($job->level) }} level</span>
                        <span class="badge bg-secondary p-2">{{ ucwords($job->type) }}</span>
                    </div>
                    <div class="font_13px"><b>{{ $job->views }}</b> views</div>
                    <div class="font_13px">
                        <b>{{ $job->applicants_applied }}</b> applied, <b>{{ $job->applicants }}</b> needed
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div class="font_13px">
                            <div><b>
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
                                {{ number_format($job->payment) }}/{{ $job->payment_day }}
                            </b></div>
                            <div>{{ ucwords(Auth::user()->location) }}</div>
                        </div>
                        <div class="mr-0">
                            <a href="/d/job_post/{{ $job->unique_id }}">
                            <button class="btn btn-dark">Open</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach   
        {{ $jobs->links('vendor.livewire.modifiedStyle') }}
    @endif
</div>