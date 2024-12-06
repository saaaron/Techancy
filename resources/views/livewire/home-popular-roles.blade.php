<div class="d-sm-flex justify-content-center">
    @if($totalRecordsCount == 0) 
        <div>
            <button class="btn btn-outline-dark"><span class="bt bi-search"></span> None yet</button>
        </div>
    @else
        @foreach ($popularRoles as $popularRole)
            <div class="me-sm-4 mb-2">
                <a href="search?s={{ $popularRole->role }}">
                    <button class="btn btn-outline-dark"><span class="bi-search"></span> 
                        @if ($popularRole->role == "ai")
                            Artificial Intelligence
                        @elseif ($popularRole->role == "backend_dev")
                            Back-End Development
                        @elseif ($popularRole->role == "blockchain_dev")
                            Blockchain Development
                        @elseif ($popularRole->role == "cloud_comp")
                            Cloud Computing
                        @elseif ($popularRole->role == "cyber_sec")
                            Cybersecurity
                        @elseif ($popularRole->role == "data_sci_n_analytics")
                            Data Science & Analytics
                        @elseif ($popularRole->role == "devops_n_sre")
                            DevOps & SRE
                        @elseif ($popularRole->role == "frontend_dev")
                            Front-End Development
                        @elseif ($popularRole->role == "fullstack_dev")
                            Full-Stack Development
                        @elseif ($popularRole->role == "game_dev")
                            Game Development
                        @elseif ($popularRole->role == "it_support_n_helpd")
                            IT Support & Helpdesk
                        @elseif ($popularRole->role == "mac_learning_engr")
                            Machine Learning Engineering
                        @elseif ($popularRole->role == "mobile_app_dev")
                            Mobile App Development
                        @elseif ($popularRole->role == "net_engr")
                            Network Engineering
                        @elseif ($popularRole->role == "prod_mgt")
                            Product Management
                        @elseif ($popularRole->role == "qa_test_n_auto")
                            QA Testing & Automation
                        @elseif ($popularRole->role == "software_engr")
                            Software Engineering
                        @elseif ($popularRole->role == "systems_admin")
                            Systems Administration
                        @elseif ($popularRole->role == "uiux_design")
                            UI/UX Design
                        @elseif ($popularRole->role == "web_dev")
                            Web Development
                        @endif
                    </button>
                </a>
            </div>
        @endforeach
    @endif
</div>