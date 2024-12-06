<div>
    <form wire:submit="changeJobPostsCurrency">
        <div class="d-grid gap-2">
            <div class="form-check">
                <input wire:model="currency" value="NGN" type="radio" class="form-check-input" id="ngn" @if ($currency == 'NGN') checked @endif>
                <label class="form-check-label" for="ngn">Naira (₦)</label>
            </div>
            <div class="form-check">
                <input wire:model="currency" value="USD" type="radio" class="form-check-input" id="usd" @if ($currency == 'USD') checked @endif>
                <label class="form-check-label" for="usd">US Dollar ($)</label>
            </div>
            <div class="form-check">
                <input wire:model="currency" value="POUND" type="radio" class="form-check-input" id="pound" @if ($currency == 'POUND') checked @endif>
                <label class="form-check-label" for="pound">Pound (£)</label>
            </div>
            <div class="form-check">
                <input wire:model="currency" value="EURO" type="radio" class="form-check-input" id="euro" @if ($currency == 'EURO') checked @endif>
                <label class="form-check-label" for="euro">Euro (€)</label>
            </div>
            <div class="form-check">
                <input wire:model="currency" value="YEN" type="radio" class="form-check-input" id="yen" @if ($currency == 'YEN') checked @endif>
                <label class="form-check-label" for="yen">Yen (¥)</label>
            </div>
            @error('currency')
                <div class="text-danger font_13px">{{ $message }}</div>
            @enderror
            @if(session("no_changes"))
                <div class="text-info font_13px">{{ session('no_changes') }}</div>
            @elseif(session("success"))
                <div class="text-success font_13px">{{ session('success') }}</div>
            @endif
            <div>
                <button type="submit" class="btn btn-dark"><span wire:loading class="spinner-border text-light" role="status"></span> Done</button>
            </div>
        </div>
    </form>
</div>
