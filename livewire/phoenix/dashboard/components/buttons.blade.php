<div class="grid grid-cols-{{ $buttonCount }} gap-2 {{ $componentWidth }}">
    @if($showBooking)
        @if($hasBooking)
            <a href="{{ route('phoenix.flight-centre.booking') }}" wire:navigate
               class="btn grow btn-primary btn-sm shadow">View Your Booking</a>
        @else
            <a href="{{ route('phoenix.flight-centre.book') }}" wire:navigate class="grow btn btn-primary btn-sm shadow">Make a
                Booking</a>
        @endif
    @endif
    @if($showEvent)
        <a href="{{ route('phoenix.events') }}" wire:navigate class="grow btn btn-primary btn-sm shadow">Our Events</a>
    @endif
    @if($showPirep)
        <a href="{{ route('phoenix.flight-centre.pireps') }}" wire:navigate class="grow btn btn-primary btn-sm shadow">Your
            PIREPs</a>
    @endif
    @foreach($otherButtons as $button)
        @if($button['external'])
            <a href="{{ $button['url'] }}" target="_blank" class="grow btn btn-primary btn-sm shadow">{{ $button['name'] }}</a>
        @else
            <a href="{{ $button['url'] }}" wire:navigate class="grow btn btn-primary btn-sm shadow">{{ $button['name'] }}</a>
        @endif
    @endforeach
</div>
