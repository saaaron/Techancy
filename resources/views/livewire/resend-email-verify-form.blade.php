<div>
    @if(auth()->user()->email_verified == "yes") 
        <div class="alert alert-info text-center">
            Email address has already been verified
        </div>
    @else
        <form wire:submit="resend_verify_email">
            @csrf
            <div class="d-grid gap-2">
                <p>Hello {{ auth()->user()->name }}!
                <div class="text_verify">
                    We sent you an email to verify your email address (<b>{{ auth()->user()->email }}</b>). Please check your inbox and verify your email address to access your dashboard and other features. 
                </div>
                <div class="text_verify"> 
                    And if you can't find the email, click on the button below to recieve another
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
                <div class="d-grid mt-1">
                    <button type="submit" class="btn btn-dark"><span wire:loading class="spinner-border text-light" role="status"></span> Resend verification email</button>
                </div>
            </div>
        </form>
    @endif
</div>
