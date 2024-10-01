<div class="flex flex-col space-y-2">
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">Booking Details</h4>
            <div>
                Booking #{{ $booking->id }}
            </div>
        </div>

        <div class="px-6 py-2 space-y-2">
            <div class="grid sm:grid-cols-3 gap-3">
                <div class="col-span-1">
                    <p class="text-gray-400">Pilot</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $booking->pilot->username }} {{ $booking->pilot->user->public_name }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-center">
                    <p class="text-gray-400">Rank</p>
                    <div class=" gap-3 mt-1">
                        <h5 class="font-medium">{{ $booking->pilot->preferredRank->name }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-right">
                    <p class="text-gray-400">Registration</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $booking->pilot->created_at->format('jS \o\f F, y') }}</h5>
                    </div>
                </div>
            </div>

            <div class="grid sm:grid-cols-3 gap-3">
                <div class="col-span-1">
                    <p class="text-gray-400">Departure</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $booking->route->departureAirportAll->name }}</h5>
                        <h5 class="font-medium">{{ $booking->route->departureAirportAll->identifiers }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-center">
                    <p class="text-gray-400">Arrival</p>
                    <div class=" gap-3 mt-1">
                        <h5 class="font-medium">{{ $booking->route->arrivalAirportAll->name }}</h5>
                        <h5 class="font-medium">{{ $booking->route->arrivalAirportAll->identifiers }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-right">
                    <p class="text-gray-400">Callsign & Flight Number</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $booking->callsign }}</h5>
                        <h5 class="font-medium">{{ $booking->flight_number }}</h5>
                    </div>
                </div>
            </div>

            <hr class="divider" />

            <div class="grid sm:grid-cols-4 gap-3">
                <div class="col-span-1">
                    <p class="text-gray-400">Aircraft</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $booking->aircraft->registration }}
                            | {{ $booking->aircraft->name }}</h5>
                        <h5 class="font-medium">{{ $booking->aircraft->type->name }}
                            | {{ $booking->aircraft->type->code }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-center">
                    <p class="text-gray-400">Booking</p>
                    <div class=" gap-3 mt-1">
                        <h5 class="font-medium">{{ ucfirst($booking->type) }}</h5>
                        <h5 class="font-medium">{{ $booking->network }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-center">
                    <p class="text-gray-400">Level and Cost Index</p>
                    <div class=" gap-3 mt-1">
                        <h5 class="font-medium">{{ $booking->altitude/100 }}</h5>
                        <h5 class="font-medium">{{ $booking->cost_index }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-right">
                    <p class="text-gray-400">Passengers & Freight</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $booking->passengers }}</h5>
                        <h5 class="font-medium">{{ number_format(convertWeightValue($booking->cargo, $pilot)->value) }} {{ convertWeightValue($booking->cargo, $pilot)->measure }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">Network Connection Details</h4>
            <div>
                {{ $booking->network }}
            </div>
        </div>

        <div class="px-6 py-2 space-y-2">
            @foreach($connections as $connection)
                <div class="grid sm:grid-cols-3 gap-3">
                    <div class="col-span-1">
                        <p class="text-gray-400">Network</p>
                        <div class="gap-3 mt-1">
                            <h5 class="font-medium">{{ $connection->network }}</h5>
                        </div>
                    </div>

                    <div class="col-span-1 sm:text-center">
                        <p class="text-gray-400">Callsign</p>
                        <div class=" gap-3 mt-1">
                            <h5 class="font-medium">{{ $connection->callsign }}</h5>
                        </div>
                    </div>

                    <div class="col-span-1 sm:text-right">
                        <p class="text-gray-400">Flight Plan</p>
                        <div class="gap-3 mt-1">
                            <h5 class="font-medium">{{ $connection->has_flight_plan?'Yes':'No' }}</h5>
                        </div>
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-3">

                    <div class="col-span-1 sm:text-left">
                        <p class="text-gray-400">Departure</p>
                        <div class="gap-3 mt-1">
                            <h5 class="font-medium">{{ $connection->departure_icao }}</h5>
                        </div>
                    </div>
                    <div class="col-span-1 sm:text-right">
                        <p class="text-gray-400">Arrival</p>
                        <div class="gap-3 mt-1">
                            <h5 class="font-medium">{{ $connection->arrival_icao }}</h5>
                        </div>
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-3">
                    <div class="col-span-1 sm:text-left">
                        <p class="text-gray-400">Connected At</p>
                        <div class="gap-3 mt-1">
                            <h5 class="font-medium">{{ \Carbon\Carbon::parse($connection->connected_at)->format('jS \o\f F, y') }}</h5>
                        </div>
                    </div>
                    <div class="col-span-1 sm:text-right">
                        <p class="text-gray-400">Disconnected At</p>
                        <div class="gap-3 mt-1">
                            <h5 class="font-medium">{{ \Carbon\Carbon::parse($connection->disconnected_at)->format('jS \o\f F, y') }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
