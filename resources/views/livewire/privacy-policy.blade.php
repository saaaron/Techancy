<div class="text_justify">
    @foreach ($privacy_policy as $privacy_policy)
        {!! $privacy_policy->privacy_policy_html !!}
        <p>Effective date: {{ $privacy_policy->updated_at ? $privacy_policy->updated_at->format('d M, Y H:i A') : 'Not available' }}</p>
    @endforeach
</div>
