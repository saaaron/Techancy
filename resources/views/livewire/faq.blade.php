<div class="accordion" id="faq_accordion">
    @foreach ($faqs as $faq)
        <div class="accordion-item">
            <h4 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                    {{ $faq->question }}
                </button>
            </h4>
            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" data-bs-parent="#faq_accordion">
                <div class="accordion-body">
                    {!! $faq->faq_html !!}
                </div>
            </div>
        </div>
    @endforeach
</div>
