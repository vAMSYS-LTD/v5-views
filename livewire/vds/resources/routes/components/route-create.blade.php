<div>
    @if(($departureAirport == null || !$departureAirport) || ($arrivalAirport == null || !$arrivalAirport))
        <span href="javascript:;" @mouseenter="$popovers('Select Departure and Arrival Airport above first')" data-trigger="mouseenter" class="btn bg-primary btn-primary rounded-none rounded-b-lg disabled">
            Create New Route
        </span>
    @else
        {{ $this->createRouteAction }}
    @endif

    <div> <!-- Show created Routes -->

    </div>

    <x-filament-actions::modals />
</div>
