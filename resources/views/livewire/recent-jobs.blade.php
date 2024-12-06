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
        @foreach ($recentJobs as $recentJob)
            <div class="col-lg-4 col-xl-4 mb-3">
                <div class="card p-3 @if ($recentJob->applicants_applied == $recentJob->applicants) bg-body-tertiary @endif">
                    <div class="d-flex justify-content-start mb-3 font_13px">
                        <div class="sm_profile_photo_prev">
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="profile photo">
                        </div>
                        <div class="mt-2"><b>By you</b></div>
                        <div class="mt-2 ms-auto">
                            <div class="text-muted"><b>{{ $recentJob->created_at->diffForHumans() }}</b></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h5><b>
                            @if ($recentJob->role == "ai")
                                Artificial Intelligence
                            @elseif ($recentJob->role == "backend_dev")
                                Back-End Development
                            @elseif ($recentJob->role == "blockchain_dev")
                                Blockchain Development
                            @elseif ($recentJob->role == "cloud_comp")
                                Cloud Computing
                            @elseif ($recentJob->role == "cyber_sec")
                                Cybersecurity
                            @elseif ($recentJob->role == "data_sci_n_analytics")
                                Data Science & Analytics
                            @elseif ($recentJob->role == "devops_n_sre")
                                DevOps & SRE
                            @elseif ($recentJob->role == "frontend_dev")
                                Front-End Development
                            @elseif ($recentJob->role == "fullstack_dev")
                                Full-Stack Development
                            @elseif ($recentJob->role == "game_dev")
                                Game Development
                            @elseif ($recentJob->role == "it_support_n_helpd")
                                IT Support & Helpdesk
                            @elseif ($recentJob->role == "mac_learning_engr")
                                Machine Learning Engineering
                            @elseif ($recentJob->role == "mobile_app_dev")
                                Mobile App Development
                            @elseif ($recentJob->role == "net_engr")
                                Network Engineering
                            @elseif ($recentJob->role == "prod_mgt")
                                Product Management
                            @elseif ($recentJob->role == "qa_test_n_auto")
                                QA Testing & Automation
                            @elseif ($recentJob->role == "software_engr")
                                Software Engineering
                            @elseif ($recentJob->role == "systems_admin")
                                Systems Administration
                            @elseif ($recentJob->role == "uiux_design")
                                UI/UX Design
                            @elseif ($recentJob->role == "web_dev")
                                Web Development
                            @endif
                        </b></h5>
                        <span class="badge bg-primary p-2">{{ ucwords($recentJob->level) }} level</span>
                        <span class="badge bg-secondary p-2">{{ ucwords($recentJob->type) }}</span>
                    </div>
                    <div class="font_13px"><b>{{ $recentJob->views }}</b> views</div>
                    <div class="font_13px">
                        <b>{{ $recentJob->applicants_applied }}</b> applied, <b>{{ $recentJob->applicants }}</b> needed
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
                                {{ number_format($recentJob->payment) }}/{{ $recentJob->payment_day }}
                            </b></div>
                            <div>{{ ucwords(Auth::user()->location) }}</div>
                        </div>
                        <div class="mr-0">
                            <a href="/d/job_post/{{ $recentJob->unique_id }}">
                            <button class="btn btn-dark">Open</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach  
    @endif 
</div>