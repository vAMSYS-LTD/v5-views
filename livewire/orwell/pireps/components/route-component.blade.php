<div class="card mb-4">
    <div class="card-header flex justify-between items-center">
        <h4 class="card-title">Route</h4>
        <div>
            Route #{{ $this->pirep->route_id }}
        </div>
    </div>

    <div class="px-6 py-2 space-y-2">

        @if($pirep->booking->user_route != $pirep->route->route)
            <div>
                <p class="text-gray-400">Pilot Route</p>
                <div class="gap-3 mt-1">
                    <h5 class="font-medium">{{ $pirep->booking->user_route }}</h5>
                </div>
            </div>
        @endif

        @if($pirep->booking->user_route == $pirep->route->route)
            <div>
                <p class="text-gray-400">Route</p>
                <div class="gap-3 mt-1">
                    <h5 class="font-medium">{{ $pirep->route->route }}</h5>
                </div>
            </div>
        @else
            <div>
                <p class="text-gray-400">Company Route</p>
                <div class="gap-3 mt-1">
                    <h5 class="font-medium">{{ $pirep->route->route }}</h5>
                </div>
            </div>
        @endif

        @if($pirep->route->remarks)
            <div>
                <p class="text-gray-400">Route Remarks</p>
                <div class="gap-3 mt-1">
                    <h5 class="font-medium">{{ $pirep->route->remarks }}</h5>
                </div>
            </div>
        @endif

        <div class="grid sm:grid-cols-4 gap-3">
            <div class="col-span-1">
                <p class="text-gray-400">Callsign</p>
                <div class="gap-3 mt-1">
                    <h5 class="font-medium">{{ $this->pirep->route->callsign }}</h5>
                </div>
            </div>

            <div class="col-span-1 sm:text-center">
                <p class="text-gray-400">Flight Number</p>
                <div class="gap-3 mt-1">
                    <h5 class="font-medium">{{ $this->pirep->route->flight_number }}</h5>
                </div>
            </div>

            <div class="col-span-1 sm:text-center">
                <p class="text-gray-400">Cost Index</p>
                <div class="gap-3 mt-1">
                    <h5 class="font-medium">{{ $this->pirep->route->cost_index }}</h5>
                </div>
            </div>

            <div class="col-span-1 sm:text-right">
                <p class="text-gray-400">Flight Level</p>
                <div class="gap-3 mt-1">
                    <h5 class="font-medium">{{ $this->pirep->route->altitude/100 }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
