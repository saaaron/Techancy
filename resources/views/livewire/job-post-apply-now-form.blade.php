<div>
    <form wire:submit="job_post_apply_now">
        <div class="d-grid gap-2 apply_job_labels">
            <div>
                <label for="name">Full name</label>
                <input wire:model="name" type="text" id="name" class="form-control" autocomplete="off" required>
                @error('name')
                    <span class="text-danger font_13px">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="email">Email addres</label>
                <input wire:model="email" type="email" id="email" class="form-control" autocomplete="off" required>
                @error('email')
                    <span class="text-danger font_13px">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="resume">Resume (pdf, docx)</label>
                <input wire:model="resume" type="file" id="resume" class="form-control" accept=".docx, .pdf" required>
                <div wire:loading class="text-info font_13px">Loading resume, please wait...</div>
                @error('resume')
                    <span class="text-danger font_13px">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="cover_letter"><b>Cover letter</b></label>
                <p class="text_justify font_13px">
                    We have arranged a format of how your cover letter should look when sent to <b>{{ $by_user_name }}</b>. All we need is the body from you.
                </p>
                <div class="font_13px">
                    <p>Dear Hiring Manager,</p>
                    <textarea wire:model="cover_letter" id="cover_letter" class="form-control mb-2" rows="5" placeholder="200 - 1,500" autocomplete="off" required></textarea>
                    @error('cover_letter')
                        <span class="text-danger font_13px">{{ $message }}</span>
                    @enderror
                    <p>Sincerely,<br><span>{{ ucwords($name ?? 'xxxx xxx') }}</span></p>
                </div>
            </div>
            @if(session("closed"))
                <div class="text-info font_13px">{!! session('closed') !!}</div>
            @endif
            @if(session("success"))
                <div class="text-success font_13px">{{ session('success') }}</div>
            @endif
            <div class="d-grid">
                <button type="submit" class="btn btn-dark"><span wire:loading wire:target="job_post_apply_now" class="spinner-border text-light" role="status"></span> Done</button>
            </div>
        </div>
    </form>
</div>