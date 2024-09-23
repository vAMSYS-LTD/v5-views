<div class="card">
    <div class="card-header flex justify-between items-center">
        <h4 class="card-title">PIREP AutoReject</h4>
    </div>

    <div class="px-6 py-2 space-y-2">
        @if($pirep->need_reply)
            PIREP has triggered one or more AutoRejects; Please review and make a PIREP comment with details so our Team can review the PIREP.
        @elseif($pirep->status == 'failed')
            PIREP has triggered one or more AutoRejects and is being reviewed by our Team. You do not need to take any action.
        @else
            PIREP has triggered one or more AutoRejects and PIREP has been {{ $pirep->status }}.
        @endif

        <div class="flex flex-row justify-start mt-4">
            <div class="my-auto text-base font-semibold tracking-wide">
                @foreach($pirep->pirep_data->autoreject as $reject)
                    @if($reject->silent == false)
                        <div class="">- {{ $reject->name }}</div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
