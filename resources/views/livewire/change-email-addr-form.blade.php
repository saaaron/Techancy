<div class="col-md-6">
    <form wire:submit="change_email_addr">
        <div class="d-grid gap-1">
            <div>
                <label for="email" class="font_13px">Email address</label>
                <input id="email" type="email" class="form-control" value="{{ auth()->user()->email }}" disabled>
            </div>
            <div>
                @if(session("success"))
                    <div class="text-success font_13px">{{ session('success') }}</div>
                @elseif(session("mail_failed"))
                    <div class="text-danger font_13px">{{ session('mail_failed') }}</div>
                @elseif(session("wait"))
                    <div class="text-info font_13px">{{ session('wait') }}</div>
                @endif
            </div>
            <div>
                <button type="submit" class="btn btn-dark"><span wire:loading class="spinner-border text-light" role="status"></span> Change email address</button>
            </div>
        </div>
    </form>
</div>
