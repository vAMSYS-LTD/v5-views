<div>
    @if($pirep->claim_id)
    <a href="{{ route('phoenix.flight-centre.claims', ['tableSearch' => $pirep->claim_id]) }}" target="_blank">
        <div class="alert alert-info" role="alert">
            <span class="font-bold">This PIREP is for a Claim</span> - You can view claim data by clicking here.
        </div>
    </a>
    @endif

    @if($pirep->status == 'failed')
    <div class="alert alert-warning" role="alert">
        <span class="font-bold">Pending Staff Review</span> - You do not need to take any action.
    </div>
    @endif

    @if($pirep->need_reply)
    <div class="alert alert-error" role="alert">
        <span class="font-bold">Reply Required</span> - Please check PIREP Comments - your reply is required.
    </div>
    @endif
</div>
