<div class="card">
    <div class="card-header flex justify-between items-center">
        <h4 class="card-title">Weather</h4>
        <div>
            Historic METAR
        </div>
    </div>

    <div class="px-6 py-2 space-y-2">
        <div>
            <p class="text-gray-400">{{ $this->pirep->route->departureAirportAll->identifiers }}</p>
            <div class="gap-3 mt-1">
                <h5 class="font-medium">{{ $metar->departure }}</h5>
            </div>
        </div>

        <div>
            <p class="text-gray-400">{{ $this->pirep->route->arrivalAirportAll->identifiers }}</p>
            <div class="gap-3 mt-1">
                <h5 class="font-medium">{{ $metar->arrival }}</h5>
            </div>
        </div>

        @if(isset($metar->alternate))
            <div>
                <p class="text-gray-400">Alternate</p>
                <div class="gap-3 mt-1">
                    <h5 class="font-medium">{{ $metar->alternate }}</h5>
                </div>
            </div>
        @endif
    </div>
</div>
