<div class="row mb-4">
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
        @foreach ($latestJobOpenings as $latestJobOpening)
            <div class="col-md-4 col-lg-4 col-xl-4 mb-2">
                <div class="card p-3 @if ($latestJobOpening->applicants_applied == $latestJobOpening->applicants) bg-body-tertiary @endif">
                    <div class="d-flex justify-content-start mb-3 font_13px">
                        <div class="sm_profile_photo_prev">
                            <img src="{{ asset('storage/' . $latestJobOpening->user_image) }}" alt="profile photo">
                        </div>
                        <div class="mt-2"><b>{{ $latestJobOpening->user_name }}</b></div>
                        <div class="mt-2 ms-auto">
                            <div class="text-muted"><b>{{ $latestJobOpening->created_at->diffForHumans() }}</b></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h5><b>
                            @if ($latestJobOpening->role == "ai")
                                Artificial Intelligence
                            @elseif ($latestJobOpening->role == "backend_dev")
                                Back-End Development
                            @elseif ($latestJobOpening->role == "blockchain_dev")
                                Blockchain Development
                            @elseif ($latestJobOpening->role == "cloud_comp")
                                Cloud Computing
                            @elseif ($latestJobOpening->role == "cyber_sec")
                                Cybersecurity
                            @elseif ($latestJobOpening->role == "data_sci_n_analytics")
                                Data Science & Analytics
                            @elseif ($latestJobOpening->role == "devops_n_sre")
                                DevOps & SRE
                            @elseif ($latestJobOpening->role == "frontend_dev")
                                Front-End Development
                            @elseif ($latestJobOpening->role == "fullstack_dev")
                                Full-Stack Development
                            @elseif ($latestJobOpening->role == "game_dev")
                                Game Development
                            @elseif ($latestJobOpening->role == "it_support_n_helpd")
                                IT Support & Helpdesk
                            @elseif ($latestJobOpening->role == "mac_learning_engr")
                                Machine Learning Engineering
                            @elseif ($latestJobOpening->role == "mobile_app_dev")
                                Mobile App Development
                            @elseif ($latestJobOpening->role == "net_engr")
                                Network Engineering
                            @elseif ($latestJobOpening->role == "prod_mgt")
                                Product Management
                            @elseif ($latestJobOpening->role == "qa_test_n_auto")
                                QA Testing & Automation
                            @elseif ($latestJobOpening->role == "software_engr")
                                Software Engineering
                            @elseif ($latestJobOpening->role == "systems_admin")
                                Systems Administration
                            @elseif ($latestJobOpening->role == "uiux_design")
                                UI/UX Design
                            @elseif ($latestJobOpening->role == "web_dev")
                                Web Development
                            @endif
                        </b></h5>
                        <span class="badge bg-primary p-2">{{ ucwords($latestJobOpening->level) }} level</span>
                        <span class="badge bg-secondary p-2">{{ ucwords($latestJobOpening->type) }}</span>
                    </div>
                    <div class="font_13px"><b>{{ $latestJobOpening->views }}</b> views</div>
                    <div class="font_13px">
                        <b>{{ $latestJobOpening->applicants_applied }}</b> applied, <b>{{ $latestJobOpening->applicants }}</b> needed
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div class="font_13px">
                            <div><b>
                                @if ($latestJobOpening->user_currency == "NGN")
                                    ₦
                                @elseif ($latestJobOpening->user_currency == "USD")
                                    $
                                @elseif ($latestJobOpening->user_currency == "POUND")
                                    £
                                @elseif ($latestJobOpening->user_currency == "EURO")
                                    €
                                @elseif ($latestJobOpening->user_currency == "YEN")
                                    ¥
                                @endif
                                {{ number_format($latestJobOpening->payment) }}/{{ $latestJobOpening->payment_day }}
                            </b></div>
                            <div>{{ $latestJobOpening->user_location }}</div>
                        </div>
                        @if ($latestJobOpening->applicants_applied == $latestJobOpening->applicants) 
                            <div class="mr-0">
                                <button class="btn btn-dark" disabled><span class="bi-exclamation-triangle"></span> Closed</button>
                            </div>
                        @else
                            <div class="mr-0">
                                <a href="/job_post/{{ $latestJobOpening->unique_id }}">
                                    <button class="btn btn-dark">Apply</button>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
