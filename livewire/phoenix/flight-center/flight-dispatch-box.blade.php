@php use Carbon\Carbon; @endphp
<div class="mt-2">
    @if($route)
        <form wire:submit="makeBooking">
            {{ $this->form }}
            @if($aircraft)
                @if($this->user->simbrief_username)
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
                @else
                    <div class="grid grid-cols-2 mt-2 mb-5 gap-2">
                        <div>
                            {{ $this->cancelAction }}
                        </div>
                        <div>
                            {{ $this->submitAction }}
                        </div>
                    </div>
                @endif

            @endif
        </form>
        @if($sbDispatch)
            @include('livewire.phoenix.flight-center.components.sbapiform')
        @endif
    @endif

    <x-filament-actions::modals/>
</div>
@script
<script>
    $wire.on('simbrief-dispatched', (event) => {
        let bookingId = event.bookingId;

        // Define a function to check if the input exists
        function checkInputExists() {
            const input = document.querySelector('form#sbapiform input[name="fltnum"]');

            if (input) {
                // If the input exists, call simbriefsubmit
                simbriefsubmit('/phoenix/flight-center/booking/' + bookingId);
            } else {
                // If the input does not exist, wait for 500ms and check again
                setTimeout(checkInputExists, 100);
            }
        }

        // Start checking if the input exists
        checkInputExists();
    });
</script>
@endscript

