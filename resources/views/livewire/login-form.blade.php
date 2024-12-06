<div>
    <form  wire:submit="login_user">
        @csrf
        <div class="d-grid gap-2">
            <div>
                <label for="email" class="font_13px">Email address</label>
                <input wire:model="email" type="email" id="email" class="form-control" autocomplete="off" required>
            </div>
            <div>
                <div class="d-flex justify-content-between font_13px">
                    <div>
                        <label for="password">Password</label>
                    </div>
                    <div>
                        <a href="/forgot_password">Forgot password?</a>
                    </div>
                </div>
                <input wire:model="password" type="password" id="password" class="form-control" autocomplete="off" required>
            </div>
            <div>
                <div class="form-check">
                    <input wire:model="keep_me_logged_in" type="checkbox" class="form-check-input" id="keepMeLoggedIn">
                    <label class="form-check-label font_13px" for="keepMeLoggedIn"> Keep me logged in</label>
                </div>
            </div>
            @if(session()->has('verify_msg'))
                <div class="text-success font_13px">
                    {{session()->get('verify_msg')}}
                </div>
            @elseif(session()->has('reset_pass_msg'))
                <div class="text-success font_13px">
                    {{session()->get('reset_pass_msg')}}
                </div>
            @elseif(session("login_failed"))
                <div class="text-danger font_13px">
                    {!! session('login_failed') !!}
                </div>
            @elseif(session()->has('must_login'))
                <div class="text-warning font_13px">
                    {!! session()->get('must_login') !!}
                </div>
            @elseif(session()->has('g_login_msg'))
                <div class="text-danger font_13px">
                    {{session()->get('g_login_msg')}}
                </div>
            @elseif(session()->has('reset_email_msg'))
                <div class="text-success font_13px">
                    {{session()->get('reset_email_msg')}}
                </div>
            @elseif(session()->has('delete_acct_msg'))
                <div class="text-success font_13px">
                    {{session()->get('delete_acct_msg')}}
                </div>
            @elseif(session()->has('logout_msg'))
                <div class="text-success font_13px">
                    {{session()->get('logout_msg')}}
                </div>
            @endif
            <div class="d-grid mt-1 mb-2">
                <button class="btn btn-dark"><span wire:loading class="spinner-border text-light" role="status"></span> <b>Login</b></button>
            </div>
            <div class="text-center font_13px">
                Don't have an account yet? <a href="/signup">Sign up</a>
            </div>
        </div>
    </form>
</div>
