<div class="card mb-4">
    <div class="card-header flex justify-between items-center">
        <div class="flex grow">
            <div class="w-24 grow-0 pr-4">
                @switch($notam->priority)
                    @case('high')
                        <div
                            class="badge w-full badge-error text-center">{{ ucfirst($notam->priority) }}</div>
                        @break
                    @case('medium')
                        <div
                            class="badge w-full badge-warning text-center">{{ ucfirst($notam->priority) }}</div>
                        @break
                    @case('low')
                        <div
                            class="badge w-full badge-info text-center">{{ ucfirst($notam->priority) }}</div>
                        @break
                @endswitch
            </div>
            <div class="grow-0 pr-4">
                @if($notam->must_read && !$read)
                    <div class="badge w-full badge-error text-center">Must Read</div>
                @elseif(!$read)
                    <div class="badge w-full badge-warning text-center">Unread</div>
                @else
                    <div class="badge w-full badge-success text-center">Read</div>
                @endif
            </div>
            @if($notam->stop_showing_at)
                <div class="grow-0 text-xs self-center mr-4">Active Till:
                    <br/>{{ $notam->stop_showing_at?$notam->stop_showing_at->format('Y-m-d'):'Permanent' }}
                </div>
            @else
                <div class="grow-0 text-xs self-center mr-4">Permanent<br/>NOTAM</div>
            @endif
            <h4 class="card-title w-full flex-1 self-center {{ $notam->must_read ? 'font-bold underline' : '' }}">{{ $notam->title }}</h4>
            @if($notam->tag)
                <div class="badge grow-0 badge-info text-center mr-4">{{ $notam->tag  }}</div>
            @endif
        </div>
        <div class="grow-0 text-xs self-center mr-4">Posted:
            <br/>{{ $notam->start_showing_at?$notam->start_showing_at->format('Y-m-d'):$notam->created_at->format('Y-m-d') }}
        </div> <!-- TODO set so notams have start show date by default -->
    </div>

    <div class="card w-full overflow-auto">
        <div class="px-6 pb-6 pt-2">
            <div class="font-bold text-lg mb-4">
                {{ $notam->title }}
            </div>
            {!! $notam->content !!}

            @if($notam->must_read && !$read)
                <form wire:submit="notamAcknowledged({{ $notam->id }}, true)">
                    <button type="submit"
                            class="btn w-full rounded-none rounded-b-sm btn-primary mt-4">
                        Acknowledge
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
