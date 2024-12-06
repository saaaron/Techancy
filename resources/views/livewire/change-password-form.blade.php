<div class="col-md-6">
    <form wire:submit="change_password">
        <div class="d-grid gap-2">
            <div>
                <label for="password" class="font_13px">New Password</label>
                <input wire:model="password" type="password" id="password" class="form-control" autocomplete="off" required>
                @error('password')
                    <span class="text-danger font_13px">{{ $message }}</span>
                @enderror
            </div>
            <div>
                @if(session("success"))
                    <div class="text-success font_13px">{{ session('success') }}</div>
                @elseif(session("no_changes"))
                    <div class="text-info font_13px">{{ session('no_changes') }}</div>
                @endif
            </div>
            <div>
                <button type="submit" class="btn btn-dark"><span wire:loading class="spinner-border text-light" role="status"></span> Done</button>
            </div>
        </div>
    </form>
</div>
