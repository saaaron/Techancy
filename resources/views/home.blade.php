@extends('layouts.home')

@section('title', 'Techancy - Connecting talents with tech opportunities')

@section('content')
    <div id="margin_btw_header" class="container p-3 mb-5">
        <div class="row">
            <div class="col-md-2 col-lg-2 col-xl-2"></div>
            <div class="col-md-8 col-lg-8 col-xl-8">
                <div class="text-center">
                    <h2 style="font-family: Inter Black">Connecting talents with tech opportunities</h2>
                    <p class="text-muted">
                        Looking for your next tech job? {{ env('APP_NAME') }} brings you the latest job openings from top employers in the tech industry. Start your search today and find the opportunity that matches your skills and passion.
                    </p>
                    <div class="d-flex justify-content-center">
                        <div>
                            <a href="/search">
                                <button class="btn btn-outline-dark">Search for jobs</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2"></div>
        </div>
    </div>
    <div class="container-fluid find_a_job_section p-5 mb-5">
        <div class="row">
            <div class="d-flex justify-content-center mb-4">

                {{-- search form --}}
                @livewire('home-search-role-form')

            </div>
            <div class="text-center d-grid gap-1">
                <h5 style="font-family: Inter Bold">Popular roles</h5>
                @livewire("home-popular-roles")               
            </div>
        </div>
    </div>
    <div class="container p-3 mb-5">
        <div class="row mb-2">
            <div class="col-md-2 col-lg-2 col-xl-2"></div>
            <div class="col-md-8 col-lg-8 col-xl-8">
                <div class="text-center">
                    <h2 style="font-family: Inter Black">Find jobs at any level</h2>
                    <p class="text-muted">
                        No matter where you are in your tech career, {{ env('APP_NAME') }} offers job opportunities tailoured to your experience. Explore roles from intern to senior positions and find the perfect fit your skills.
                    </p>
                </div>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2"></div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-2">
                <div class="card border-0 shadow p-3">
                    <div class="text-center">
                        <h6 style="font-family: Inter Bold">Intern</h6>
                        <p class="text-muted font_12px">Kickstart your career with valuable industry experience</p>
                        <div class="font_12px"><b>{{ $internStatsCount }} Jobs</b></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <div class="card border-0 shadow p-3">
                    <div class="text-center">
                        <h6 style="font-family: Inter Bold">Entry</h6>
                        <p class="text-muted font_12px">Get your foot in the door with beginner-friendly roles</p>
                        <div  class="font_12px"><b>{{ $entryStatsCount }} Jobs</b></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <div class="card border-0 shadow p-3">
                    <div class="text-center">
                        <h6 style="font-family: Inter Bold">Mid</h6>
                        <p class="text-muted font_12px">Advance your career with challenging, growth-oriented positions</p>
                        <div  class="font_12px"><b>{{ $midStatsCount }} Jobs</b></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow p-3">
                    <div class="text-center">
                        <h6 style="font-family: Inter Bold">Senior</h6>
                        <p class="text-muted font_12px">Lead and innovate in top-level roles designed for experienced professionals</p>
                        <div class="font_12px"><b>{{ $seniorStatsCount }} Jobs</b></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-3 mb-5">
        <div class="row mb-2">
            <div class="col-md-2 col-lg-2 col-xl-2"></div>
            <div class="col-md-8 col-lg-8 col-xl-8">
                <div class="text-center">
                    <h2 style="font-family: Inter Black">Latest job openings</h2>
                    <p class="text-muted">
                        Stay updated with the newest opportunities from top employers in the tech industry. Here are the most recent job posts - apply now and take the next step in your career.
                    </p>
                </div>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2"></div>
        </div>

        {{-- latest job openings --}}
        @livewire('latest-job-openings')

        <div class="row">
            <div class="d-flex justify-content-center">
                <a href="search?s=">
                    <button class="btn btn-dark">See more <span class="bi bi-arrow-right"></span></button>
                </a>
            </div>
        </div>
    </div>
    <div class="container p-3 mb-5">
        <div class="row mb-2">
            <div class="col-md-2 col-lg-2 col-xl-2"></div>
            <div class="col-md-8 col-lg-8 col-xl-8">
                <div class="text-center">
                    <h2 style="font-family: Inter Black">Explore job categories</h2>
                    <p class="text-muted">
                        Discover a wide range of tech job opportunities across various specializations. No matter your expertise, there's a role for you in the fast-evolving world of technology. Browse through our categories to find your next career.
                    </p>
                </div>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2"></div>
        </div>
        <div class="row mb-2">
            <div class="col-md-4 col-lg-4 col-xl-4 mb-2">
                <div class="d-grid gap-2">
                    <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                        Artificial Intelligence (AI)
                    </div>
                    <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                        Back-End Development
                    </div>
                    <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                        Blockchain Development
                    </div>
                    <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                        Cloud Computing
                    </div>
                    <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                        Cybersecurity
                    </div>
                    <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                        Data Science & Analytics
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4 mb-2">
                <div class="d-grid gap-2">
                    <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                        DevOps & SRE
                    </div>
                    <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                        Front-End Development
                    </div>
                    <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                        Full-Stack Development
                    </div>
                    <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                        Game Development
                    </div>
                    <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                        IT Support & Helpdesk
                    </div>
                    <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                        Machine Learning Engineering
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4">
                <div class="d-grid gap-2">
                    <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                        Mobile App Development
                    </div>
                    <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                        Network Engineering
                    </div>
                    <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                        Product Management
                    </div>
                    <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                        QA Testing & Automation
                    </div>
                    <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                        Software Engineering
                    </div>
                    <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                        Systems Administration
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                    UI/UX Design
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card bg-white text-muted p-2 text-center border-0 shadow">
                    Web Development
                </div>
            </div>
        </div>
    </div>
@endsection