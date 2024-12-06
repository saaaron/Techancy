<div>
    <form wire:submit="delete_acct">
        <div class="d-grid gap-1">
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
                <button type="submit" class="btn btn-dark"><span wire:loading class="spinner-border text-light" role="status"></span> Delete account</button>
            </div>
        </div>
    </form>
</div>
