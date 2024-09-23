@php use Carbon\Carbon; @endphp
<div class="mt-2">
    @if($route)
        <form wire:submit="makeBooking">
            {{ $this->form }}
            @if($aircraft)
                <div class="grid grid-cols-3 mt-2 mb-5 gap-2">
                    <div>
                        {{ $this->cancelAction }}
                    </div>
                    <div>
                        {{ $this->submitAction }}
                    </div>
                    <div>
                        {{ $this->simbriefAction }}
                    </div>
                </div>
            @endif
        </form>
        @include('livewire.phoenix.flight-center.components.sbapiform')
    @endif

    <x-filament-actions::modals/>
</div>
@script
<script>
    $wire.on('simbrief-dispatched', (event) => {
        let bookingId = event.bookingId;
        simbriefsubmit('/phoenix/flight-center/booking/' + bookingId);
    });
</script>
@endscript
