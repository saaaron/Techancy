<div>
    <form wire:submit="search_role">
        <div class="container-fluid find_a_job_section p-3" style="margin-bottom: 4rem;">
            <div class="row">
                <div class="d-flex justify-content-center mb-4">
                    <div class="card p-4 border-0 shadow mx-auto" style="width: 500px;position: relative;top: 80px;">
                        <div class="input-group">
                            <div class="input-group-text" id="btnGroupAddon" style="background-color: #fff;border: #fff;"><span class="bi bi-search"></span></div>
                            <select wire:model.live="role" id="role" class="form-select" style="border: #fff;" required>
                                <option value="">Select role</option>
                                @foreach ($this->roles as $role)
                                    <option value="{{ $role->slug }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <button wire:ignore class="btn btn-light d-md-none d-lg-none d-lg-none d-xl-block d-xl-none d-xxl-block d-xxl-none" data-bs-toggle="offcanvas" data-bs-target="#filterMenu" aria-controls="filterMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="bi-filter"></span></button>
                            <button type="submit" class="btn btn-dark" id="button-addon1"><span wire:loading class="spinner-border text-light" role="status"></span> Search<span wire:loading>ing...</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row mb-5">
                    <div class="mb-2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Search</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="mb-2">
                        <h6 style="font-family: Inter Bold;">
                            @if ($resultsCount == 0)
                                no results found
                            @elseif ($resultsCount == 1)
                                {{ $resultsCount }} result found
                            @else
                                {{ $resultsCount }} results found
                            @endif
                        </h6>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8 d-grid gap-2">
                        <div class="d-grid gap-2 mb-4">
                            @foreach($results as $result)
                                <div class="card p-3 @if ($result->applicants_applied == $result->applicants) bg-body-tertiary @endif">
                                    <div class="d-flex justify-content-start mb-3 font_13px">
                                        <div class="sm_profile_photo_prev">
                                            <img src="{{ asset('storage/' . $result->user_image) }}" alt="profile photo">
                                        </div>
                                        <div class="mt-2"><b>{{ $result->user_name }}</b></div>
                                        <div class="mt-2 ms-auto">
                                            <div class="text-muted"><b>{{ $result->created_at->diffForHumans() }}</b></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <h5><b>
                                            @if ($result->role == "ai")
                                                Artificial Intelligence
                                            @elseif ($result->role == "backend_dev")
                                                Back-End Development
                                            @elseif ($result->role == "blockchain_dev")
                                                Blockchain Development
                                            @elseif ($result->role == "cloud_comp")
                                                Cloud Computing
                                            @elseif ($result->role == "cyber_sec")
                                                Cybersecurity
                                            @elseif ($result->role == "data_sci_n_analytics")
                                                Data Science & Analytics
                                            @elseif ($result->role == "devops_n_sre")
                                                DevOps & SRE
                                            @elseif ($result->role == "frontend_dev")
                                                Front-End Development
                                            @elseif ($result->role == "fullstack_dev")
                                                Full-Stack Development
                                            @elseif ($result->role == "game_dev")
                                                Game Development
                                            @elseif ($result->role == "it_support_n_helpd")
                                                IT Support & Helpdesk
                                            @elseif ($result->role == "mac_learning_engr")
                                                Machine Learning Engineering
                                            @elseif ($result->role == "mobile_app_dev")
                                                Mobile App Development
                                            @elseif ($result->role == "net_engr")
                                                Network Engineering
                                            @elseif ($result->role == "prod_mgt")
                                                Product Management
                                            @elseif ($result->role == "qa_test_n_auto")
                                                QA Testing & Automation
                                            @elseif ($result->role == "software_engr")
                                                Software Engineering
                                            @elseif ($result->role == "systems_admin")
                                                Systems Administration
                                            @elseif ($result->role == "uiux_design")
                                                UI/UX Design
                                            @elseif ($result->role == "web_dev")
                                                Web Development
                                            @endif
                                        </b></h5>
                                        <span class="badge bg-primary p-2">{{ ucwords($result->level) }} level</span>
                                        <span class="badge bg-secondary p-2">{{ ucwords($result->type) }}</span>
                                    </div>
                                    <div class="font_13px"><b>{{ $result->views }}</b> views</div>
                                    <div class="font_13px">
                                        <b>{{ $result->applicants_applied }}</b> applied, <b>{{ $result->applicants }}</b> needed
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <div class="font_13px">
                                            <div><b>
                                                @if ($result->user_currency == "NGN")
                                                    ₦
                                                @elseif ($result->user_currency == "USD")
                                                    $
                                                @elseif ($result->user_currency == "POUND")
                                                    £
                                                @elseif ($result->user_currency == "EURO")
                                                    €
                                                @elseif ($result->user_currency == "YEN")
                                                    ¥
                                                @endif
                                                {{ number_format($result->payment) }}/{{ $result->payment_day }}
                                            </b></div>
                                            <div>{{ $result->user_location }}</div>
                                        </div>
                                        @if ($result->applicants_applied == $result->applicants) 
                                            <div class="mr-0">
                                                <button class="btn btn-dark" disabled><span class="bi-exclamation-triangle"></span> Closed</button>
                                            </div>
                                        @else
                                            <div class="mr-0">
                                                <a href="/job_post/{{ $result->unique_id }}" class="btn btn-dark">
                                                    Apply
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div>
                            {{ $results->links('vendor.livewire.modifiedStyle') }}
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xl-4">
                        <div class="offcanvas-md offcanvas-end" tabindex="-1" id="filterMenu" aria-labelledby="filterMenuLabel">
                            <div class="offcanvas-header">
                              <h5 class="offcanvas-title" id="sidebarMenuLabel">Filter</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body overflow-y-auto" style="padding: 0rem !important;">
                                <div class="card p-3 border-0">
                                    <h6 class="d-none d-sm-block d-sm-none d-md-block"><b>Filter</b></h6>
                                    <div class="d-grid gap-2">
                                        <div>
                                            <div class="font_13px"><b>Level</b></div>
                                            <div class="form-check">
                                                <input wire:model.live="level" wire:ignore class="form-check-input" type="checkbox" value="intern" id="internCheckBox">
                                                <label class="form-check-label" for="internCheckBox">
                                                    Intern
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input wire:model.live="level" wire:ignore class="form-check-input" type="checkbox" value="entry" id="entryCheckBox">
                                                <label class="form-check-label" for="entryCheckBox">
                                                    Entry
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input wire:model.live="level" wire:ignore class="form-check-input" type="checkbox" value="mid" id="midCheckBox">
                                                <label class="form-check-label" for="midCheckBox">
                                                    Mid
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input wire:model.live="level" wire:ignore class="form-check-input" type="checkbox" value="senior" id="seniorCheckBox">
                                                <label class="form-check-label" for="seniorCheckBox">
                                                    Senior
                                                </label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font_13px"><b>Type</b></div>
                                            <div class="form-check">
                                                <input wire:model.live="type" wire:ignore class="form-check-input" type="checkbox" value="hybrid" id="hybridCheckBox">
                                                <label class="form-check-label" for="hybridCheckBox">
                                                    Hybrid
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input wire:model.live="type" wire:ignore class="form-check-input" type="checkbox" value="onsite" id="onsiteCheckBox">
                                                <label class="form-check-label" for="onsiteCheckBox">
                                                    On-site
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input wire:model.live="type" wire:ignore class="form-check-input" type="checkbox" value="remote" id="remoteCheckBox">
                                                <label class="form-check-label" for="remoteCheckBox">
                                                    Remote
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </form>    
</div>