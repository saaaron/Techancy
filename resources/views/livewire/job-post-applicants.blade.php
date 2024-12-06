<div>
    <h4>Applicants ({{ $totalRecordsCount }})</h4>
    <div class="d-grid gap-2">
        @if ($totalRecordsCount == 0)
            <div class="text-muted p-5">
                <div class="text-center">
                    <h1>
                        <span class="bi-info-circle-fill"></span>
                    </h1>
                    <p>Nothing yet!</p>
                </div>
            </div>
        @else
            @foreach ($jobPostApplicants as $jobPostApplicant)
                <div class="applicant_link">
                    <a href="#applicant_modal" data-bs-toggle="modal" data-bs-target="#applicant{{ $jobPostApplicant->for_notification }}_modal">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $jobPostApplicant->name }} / {{ $jobPostApplicant->email }}
                            </div>
                            <div class="text-muted">
                                <b>{{ $jobPostApplicant->created_at->diffForHumans() }}</b>
                            </div>
                        </div>
                    </a>
                    <div class="modal fade" id="applicant{{ $jobPostApplicant->for_notification }}_modal">
                        <div class="modal-dialog modal-fullscreen-sm-down">
                            <div class="modal-content">
                                <div class="modal-header p-2 pe-2 ps-2">
                                    <h6 class="modal-title" style="font-family: Inter Bold">Applicant</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-grid gap-2">
                                        <div>
                                            <b>Name:</b> {{ $jobPostApplicant->name }}
                                        </div>
                                        <div>
                                            <b>Email address:</b> {{ $jobPostApplicant->email }}
                                        </div>
                                        <div>
                                            <b>Resume:</b> <a href="{{ asset('storage/' . $jobPostApplicant->resume) }}" target="_blank">Click Here</a>
                                        </div>
                                        <div class="p-3" style="background-color: #eee;border-radius: 10px;">
                                            <h5><b>Cover letter</b></h5>
                                            <div>
                                                <p>Dear Hiring Manager,</p>
                                                <p>
                                                    {!! nl2br($jobPostApplicant->cover_letter) !!}
                                                </p>
                                                <p>Sincerely,<br><span>{{ $jobPostApplicant->name }}</span></p>
                                            </div>
                                        </div>
                                        <div>
                                            <b class="font_13px">Applied {{ $jobPostApplicant->created_at->diffForHumans() }}</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $jobPostApplicants->links('vendor.livewire.modifiedStyle') }}
        @endif
    </div>
</div>
