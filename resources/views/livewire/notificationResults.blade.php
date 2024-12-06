<div wire:poll.keep-alive.5s>
    <div class="p-1 ms-1 me-1"><h6><b>Notifications <span class="badge bg-secondary">{{ $totalRecordsCount }}<span></b></h6></div>
    <div style="max-height: 200px;overflow: auto;z-index:9999;font-size: 13px;">
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
            @foreach ($notificationResults as $notificationResult)
                <li>
                    <a wire:click="notifications()" class="dropdown-item text-wrap" href="/d/job_post/{{ $notificationResult->for_job_post }}">
                        @if ($notificationResult->type == "view")
                            Your {{ $notificationResultRole }} job post got viewed
                        @else
                            <b>{{ $notificationResult->user_name }}</b> applied for your {{ $notificationResultRole }} job post
                        @endif
                        - <span class="text-muted">{{ $notificationResult->created_at->diffForHumans() }}</span> 
                        @if ($notificationResult->seen == "no")
                            <span class='badge bg-danger'>new</span>
                        @endif
                    </a>
                </li>
            @endforeach
        @endif
    </div>
</div>
