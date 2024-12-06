<div>
    <form wire:submit="signup_user">
        <div class="d-grid gap-2">
            @csrf
            <div>
                <label for="name" class="font_13px">Name</label>
                <input wire:model="name" type="text" id="name" class="form-control" autocomplete="off" required>
                @error('name')
                    <span class="text-danger font_13px">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="email" class="font_13px">Email address</label>
                <input wire:model="email" type="email" id="email" class="form-control" autocomplete="off" required>
                @error('email')
                    <span class="text-danger font_13px">{!! $message !!}</span>
                @enderror
            </div>
            <div>
                <label for="password" class="font_13px">Password</label>
                <input wire:model="password" type="password" id="password" class="form-control" autocomplete="off" required>
                @error('password')
                    <span class="text-danger font_13px">{{ $message }}</span>
                @enderror
            </div>
            @if(session("success"))
                <div class="text-success font_13px">{{ session('success') }}</div>
            @elseif(session("mail_failed"))
                <div class="text-danger font_13px">{{ session('mail_failed') }}</div>
            @endif
            <div class="d-grid mt-1 mb-2">
                <button class="btn btn-dark"><span wire:loading class="spinner-border text-light" role="status"></span> <b>Sign up</b></button>
            </div>
            <div class="text-center font_13px">
                Have an account already? <a href="/login">Login</a>
            </div>
        </div>
    </form>
</div>