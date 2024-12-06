<div>
    <form wire:submit="pro_forgot_password">
        <div class="d-grid gap-2">
            @csrf
            <div>
                <label for="email" class="font_13px">Email address</label>
                <input wire:model="email" type="email" id="email" class="form-control" autocomplete="off" required>
                @error('email')
                    <span class="text-danger font_13px">{!! $message !!}</span>
                @enderror
            </div>
            @if(session("success"))
                <div class="text-success font_13px">{{ session('success') }}</div>
            @elseif(session("failed"))
                <div class="text-danger font_13px">{{ session('failed') }}</div>
            @elseif(session("mail_failed"))
                <div class="text-danger font_13px">{{ session('mail_failed') }}</div>
            @elseif(session("wait"))
                <div class="text-info font_13px">{{ session('wait') }}</div>
            @endif
            <div class="d-grid mt-1 mb-2">
                <button class="btn btn-dark"><span wire:loading class="spinner-border text-light" role="status"></span> <b>Done</b></button>
            </div>
            <div class="text-center font_13px">
                <a href="/login">Login</a> / <a href="/signup">Sign up</a>
            </div>
        </div>
    </form>
</div>
