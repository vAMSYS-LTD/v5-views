<div>
    @if($pirepsToReply->count() > 0)
        <div class="grid grid-cols-1">
            @foreach($pirepsToReply as $pirepItem)
                <a href="{{ route('phoenix.flight-centre.pirep', ['pirep' => $pirepItem]) }}" class="alert alert-error">
                    <strong>PIREP Needs Reply!</strong> Your PIREP #{{ $pirepItem->id }} requires you to leave a reply before you can carry on flying.
                </a>
            @endforeach
        </div>
    @endif
</div>
