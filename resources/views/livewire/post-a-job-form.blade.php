<div class="row mb-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="jobs">Jobs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Post A Job</li>
        </ol>
    </nav>
    <div class="col-lg-5 col-xl-5">
        <h4>Post A Job</h4>
        <p>Create a job post by filling all the required inputs</p>
    </div>
    <div class="col-lg-6 col-xl-6">
        <form wire:submit="post_job">
            <div class="d-grid gap-2 mb-3">
                @csrf
                <div>
                    <label class="font_13px" for="role">Role</label>
                    <select wire:model="role" id="role" class="form-select" required>
                        <option value="">Select role</option>
                        @foreach ($this->roles as $role)
                            <option value="{{ $role->slug }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <span class="text-danger font_13px">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="font_13px" for="level">Level</label>
                    <select wire:model="level" id="level" class="form-select" required>
                        <option value="">Select level</option>
                        @foreach ($this->levels as $level)
                            <option value="{{ $level->slug }}">{{ $level->name }}</option>
                        @endforeach
                    </select>
                    @error('level')
                        <span class="text-danger font_13px">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="font_13px" for="description">Description</label>
                    <textarea wire:model="description" id="description" class="form-control" rows="5" autocomplete="off" required></textarea>
                    @error('description')
                        <span class="text-danger font_13px">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="font_13px" for="type">Type</label>
                    <select wire:model="type" id="type" class="form-select" required>
                        <option value="">Select type</option>
                        @foreach ($this->types as $type)
                            <option value="{{ $type->slug }}">{{ $type->name }}</option>
                        @endforeach
                    </select> 
                    @error('type')
                        <span class="text-danger font_13px">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="font_13px" for="applicants">Applicants</label>
                    <p class="font_13px text_justify">
                        Once you have set a number for applicants you want, your job post will automatically close after the number of people who applied for the job post reaches the number you have set and others won't be able to apply anymore (as your job post will be closed). We will notify you once anyone applies and when the number of people who applied for the job post reaches the number you have set
                    </p>
                    <input wire:model="applicants" type="number" id="applicants" class="form-control" placeholder="set maximum number" autocomplete="off" required>
                    @error('applicants')
                        <span class="text-danger font_13px">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="font_13px" for="payment">Payment</label>
                    <div class="input-group">
                        <div class="input-group-text" id="btnGroupAddon">
                            @if ($currency == "NGN")
                                ₦
                            @elseif ($currency == "USD")
                                $
                            @elseif ($currency == "POUND")
                                £
                            @elseif ($currency == "EURO")
                                €
                            @elseif ($currency == "YEN")
                                ¥
                            @endif
                        </div>
                        <input wire:model="payment" type="number" id="payment" class="form-control" placeholder="amount" autocomplete="off" required>
                        <select wire:model="payment_day" id="payment_day" class="form-select" required>
                            <option value="">Pay day (hr/mon)</option>
                            @foreach ($this->paymentDays as $paymentDay)
                                <option value="{{ $paymentDay->slug }}">{{ $paymentDay->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('payment')
                        <span class="text-danger font_13px">{{ $message }}</span>
                    @enderror
                    @error('payment_day')
                        <span class="text-danger font_13px">{{ $message }}</span>
                    @enderror
                </div>
                @if(session("success"))
                    <div class="text-success font_13px">{{ session('success') }}</div>
                @endif
                <div wire:loading>
                    <span class="spinner-border text-dark" role="status"></span> Uploading, please wait.
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-dark" name="submit">Done</button>
            </div>
        </form>
    </div>
    <div class="col-md-1 col-lg-1 col-xl-1"></div>
</div>
