<div class="flex flex-col space-y-4">
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">Claim #{{ $this->claim->id }} Details</h4>
        </div>

        <div class="px-6 py-2 space-y-2">
            <div class="grid sm:grid-cols-3 gap-3">
                <div class="col-span-1">
                    <p class="text-gray-400">Pilot</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->claim->pilot->username }} {{ $this->claim->pilot->user->full_name }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-center">
                    <p class="text-gray-400">Rank</p>
                    <div class=" gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->claim->pilot->preferredRank->name }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-right">
                    <p class="text-gray-400">Registration</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->claim->pilot->created_at->format('jS \o\f F, y') }}</h5>
                    </div>
                </div>
            </div>

            <hr class="divider"/>

            <div class="grid sm:grid-cols-3 gap-3">
                <div class="col-span-1">
                    <p class="text-gray-400">Departure</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->claim->booking->route->departureAirportAll->name }}</h5>
                        <h5 class="font-medium">{{ $this->claim->booking->route->departureAirportAll->identifiers }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-center">
                    <p class="text-gray-400">Arrival</p>
                    <div class=" gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->claim->booking->route->arrivalAirportAll->name }}</h5>
                        <h5 class="font-medium">{{ $this->claim->booking->route->arrivalAirportAll->identifiers }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-right">
                    <p class="text-gray-400">Callsign & Flight Number</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->claim->booking->callsign }}</h5>
                        <h5 class="font-medium">{{ $this->claim->booking->flight_number }}</h5>
                    </div>
                </div>
            </div>

            <hr class="divider"/>

            <div class="grid sm:grid-cols-4 gap-3">
                <div class="col-span-1">
                    <p class="text-gray-400">Aircraft</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->claim->booking->aircraft->registration }} | {{ $this->claim->booking->aircraft->name }}</h5>
                        <h5 class="font-medium">{{ $this->claim->booking->aircraft->type->name }} | {{ $this->claim->booking->aircraft->type->code }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-center">
                    <p class="text-gray-400">Booking</p>
                    <div class=" gap-3 mt-1">
                        <h5 class="font-medium">{{ ucfirst($this->claim->booking->type) }}</h5>
                        <h5 class="font-medium">{{ $this->claim->booking->network }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-center">
                    <p class="text-gray-400">Level and Cost Index</p>
                    <div class=" gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->claim->booking->altitude/100 }}</h5>
                        <h5 class="font-medium">{{ $this->claim->booking->cost_index }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-right">
                    <p class="text-gray-400">Passengers & Freight</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->claim->booking->passengers }}</h5>
                        <h5 class="font-medium">{{ number_format(convertWeightValue($this->claim->booking->cargo, $pilot)->value) }} {{ convertWeightValue($this->claim->booking->cargo, $pilot)->measure }}</h5>
                    </div>
                </div>
            </div>
            <div class="grid sm:grid-cols-3 gap-3">
                <div class="col-span-1 mb-2">
                    <p class="text-gray-400">Route Departure</p>
                    <div class="gap-3">
                        @if($this->claim->booking->route->departure_time || $this->claim->booking->departure_time)
                            <h5 class="font-medium">{{ $this->claim->booking->route->departure_time?$this->claim->booking->route->departure_time->format('H:i'):$this->claim->booking->departure_time->format('H:i') }}</h5>
                        @endif
                    </div>
                </div>
                <div class="col-span-1 mb-2 sm:text-center">
                    <p class="text-gray-400">Route Arrival</p>
                    <div class="gap-3">
                        @if($this->claim->booking->route->arrival_time || $this->claim->booking->arrival_time)
                            <h5 class="font-medium">{{ $this->claim->booking->route->arrival_time?$this->claim->booking->route->arrival_time->format('H:i'):$this->claim->booking->arrival_time->format('H:i') }}</h5>
                        @endif
                    </div>
                </div>
                <div class="col-span-1 sm:text-right">
                    <p class="text-gray-400">Scheduled Time</p>
                    <div class="gap-3">
                        <h5 class="font-medium">{{ $this->claim->booking->route->flight_length->format('H:i') }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">Submitted Proof of Flight</h4>
        </div>
        <div class="px-6 py-2 space-y-2">
            <div class="divide-y divide-[#e0e6ed] dark:divide-[#1b2e4b]">
                <div class="grid grid-cols-5 gap-2">
                    @foreach($claim->proof as $item)
                        @if(array_key_exists('type', $item) && $item['type'] == 'image')
                            <a href="{{ Storage::disk('do_spaces')->url($item['data']['img']) }}" target="_blank"
                               class="flex p-2 flex-col align-content-center w-full border">
                                <div
                                    class="my-auto mx-auto text-base font-semibold tracking-wide underline hover:no-underline">
                                    <img src="{{ Storage::disk('do_spaces')->url($item['data']['img']) }}">
                                </div>
                            </a>
                        @endif
                        @if(array_key_exists('type', $item) && $item['type'] == 'link')
                            <a href="{{ $item['data']['url'] }}" target="_blank"
                               class="flex flex-col align-content-center w-full border p-2">
                                <div
                                    class="my-auto text-base font-semibold tracking-wide underline hover:no-underline">{{ $item['data']['url'] }}</div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="grid grid-cols-2 gap-4">
        <div class="card h-full">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Claim Message</h4>
            </div>
            <div class="px-6 py-2 space-y-2">
                <div class="flex flex-col align-content-center">
                    <div>{{ $claim->message }}</div>
                </div>
            </div>
        </div>
        <div class="card h-full">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">10 Previous Claims</h4>
            </div>
            <div class="px-6 py-2 space-y-2">
                <div class="flex w-full justify-around">
                    @foreach($lastClaims as $previousClaim)
                        <div>
                            <a href="{{ route('orwell.claims.claim', ['claim' => $previousClaim->id]) }}" target="_blank">{{ $previousClaim->id  }}</a>
                        </div>
                        <div>
                            {{ $previousClaim->created_at->format('jS M y H:i') }}
                        </div>
                        <div>
                            {{ ucfirst($previousClaim->status) }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



    <div class="grid grid-cols-2 gap-4">
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Computed Information</h4>
            </div>
            <div class="px-6 py-2 space-y-2">
                <div class="divide-y divide-[#e0e6ed] dark:divide-[#1b2e4b]">
                    <div class="grid grid-cols-3">
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-base font-semibold tracking-wide">{{ $estimatedTime }}</div>
                            <div class="text-sm">Claimed Time</div>
                        </div>
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-center text-base font-semibold tracking-wide">
                                @if($claim->booking_id)
                                    {{ $routeAverageTime }}
                                @else
                                    N/A
                                @endif
                            </div>
                            <div class="text-sm text-center">Average Time for Route</div>
                        </div>
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-base text-right font-semibold tracking-wide">
                                @if($claim->booking_id)
                                    {{ number_format($routeAveragePoints) }}
                                @else
                                    N/A
                                @endif
                            </div>
                            <div class="text-sm text-right">Average Points for Route</div>
                        </div>
                    </div>
                </div>
                <div class="space-y-2 divide-y divide-[#e0e6ed] dark:divide-[#1b2e4b]">
                    <div class="grid grid-cols-3">
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-base font-semibold tracking-wide"></div>
                            <div class="text-sm"></div>
                        </div>
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-center text-base font-semibold tracking-wide">{{ $pairAverageTime }}</div>
                            <div class="text-sm text-center">Average Time for Airport Pair</div>
                        </div>
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-base text-right font-semibold tracking-wide">{{ number_format($pairAveragePoints) }}</div>
                            <div class="text-sm text-right">Average Points for Airport Pair</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Claim Review</h4>
            </div>
            <div class="px-6 py-2 space-y-2">
                {{ $this->form }}
            </div>
        </div>
    </div>

</div>
