<div>
    <form wire:submit="edit_profile">
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
                <label for="bio" class="font_13px">Bio</label>
                <textarea wire:model="bio" id="bio" class="form-control" autocomplete="off" required></textarea>
                @error('bio')
                    <span class="text-danger font_13px">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="website" class="font_13px">Website</label>
                <input wire:model="website" type="url" id="website" class="form-control" autocomplete="off" required>
                @error('website')
                    <span class="text-danger font_13px">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="location" class="font_13px">Location</label>
                <input wire:model="location" type="text" id="location" class="form-control" autocomplete="off" required>
                @error('location')
                    <span class="text-danger font_13px">{{ $message }}</span>
                @enderror
            </div>
            @if(session("success"))
                <div class="text-success font_13px">{{ session('success') }}</div>
            @elseif(session("no_changes"))
                <div class="text-info font_13px">{{ session('no_changes') }}</div>
            @endif
            <div class="d-grid mt-1 mb-2">
                <button class="btn btn-dark" name="submit"><span wire:loading class="spinner-border text-light" role="status"></span> Done</button>
            </div>
        </div>
    </form>
</div>
