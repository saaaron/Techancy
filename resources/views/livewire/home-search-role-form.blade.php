<div class="card p-4 border-0 shadow mx-auto" style="width: 500px">
    <form wire:submit="search_role">
        <div class="input-group">
            <div class="input-group-text" id="btnGroupAddon" style="background-color: #fff;border: #fff;"><span class="bi bi-search"></span></div>
            <select wire:model="role" id="role" class="form-select" style="border: #fff;" required>
                <option value="">Select role</option>
                @foreach ($this->roles as $role)
                    <option value="{{ $role->slug }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-dark" id="button-addon1"><span wire:loading class="spinner-border text-light" role="status"></span> Search<span wire:loading>ing...</span></div>
        </div>
    </form>
</div>