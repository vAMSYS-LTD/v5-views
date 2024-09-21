<div>
    <livewire:phoenix.flight-center.components.flight-map-component :$booking />

    @if($bookings->count() > 1 && $bookings->first()->id != $booking->id)
        <div class="alert alert-info" role="alert">
            <span class="font-bold">Upcoming Booking</span> - You are looking at Booking details for an Upcoming
            Booking.
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">Route</h4>
            <div>
                Route #{{ $booking->route_id }}
            </div>
        </div>

        <div class="px-6 py-2 space-y-2">
            @if($booking->route->remarks)
                <div>
                    <p class="text-gray-400">Route Remarks</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $booking->route->remarks }}</h5>
                    </div>
                </div>
            @endif
            @if($booking->user_route != $booking->route->route)
                <div class="flex flex-col">
                    <p class="text-gray-400">Your Route</p>
                    <div class="mt-1 w-fit">
                        <div x-data="{ copied: false }">
                            <h5 class="font-medium"
                                @mouseenter="$popovers('Click to copy to Clipboard')"
                                data-trigger="mouseenter"
                                @click="$clipboard('{{ $booking->user_route }}'); copied = true; setTimeout(() => copied = false, 2000);">
                                {{ $booking->user_route }}
                            </h5>
                            <p x-show="copied" x-transition:enter="transition ease-out duration-200"
                               x-transition:enter-start="opacity-0 transform scale-90"
                               x-transition:enter-end="opacity-100 transform scale-100"
                               x-transition:leave="transition ease-in duration-200"
                               x-transition:leave-start="opacity-100 transform scale-100"
                               x-transition:leave-end="opacity-0 transform scale-90">
                                Copied to clipboard.
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            @if($booking->user_route == $booking->route->route)
                <div class="flex flex-col">
                    <div class="mt-1 w-fit">
                        <div x-data="{ copied: false }">
                            <h5 class="font-medium"
                                @mouseenter="$popovers('Click to copy to Clipboard')"
                                data-trigger="mouseenter"
                                @click="$clipboard('{{ $booking->route->route }}'); copied = true; setTimeout(() => copied = false, 2000);">
                                {{ $booking->route->route }}
                            </h5>
                            <p x-show="copied" x-transition:enter="transition ease-out duration-200"
                               x-transition:enter-start="opacity-0 transform scale-90"
                               x-transition:enter-end="opacity-100 transform scale-100"
                               x-transition:leave="transition ease-in duration-200"
                               x-transition:leave-start="opacity-100 transform scale-100"
                               x-transition:leave-end="opacity-0 transform scale-90">
                                Copied to clipboard.
                            </p>
                        </div>
                    </div>
                </div>
            @else
                <div class="flex flex-col">
                    <p class="text-gray-400">Company Route</p>
                    <div class="mt-1 w-fit">
                        <div x-data="{ copied: false }">
                            <h5 class="font-medium"
                                @mouseenter="$popovers('Click to copy to Clipboard')"
                                data-trigger="mouseenter"
                                @click="$clipboard('{{ $booking->route->route }}'); copied = true; setTimeout(() => copied = false, 2000);">
                                {{ $booking->route->route }}
                            </h5>
                            <p x-show="copied" x-transition:enter="transition ease-out duration-200"
                               x-transition:enter-start="opacity-0 transform scale-90"
                               x-transition:enter-end="opacity-100 transform scale-100"
                               x-transition:leave="transition ease-in duration-200"
                               x-transition:leave-start="opacity-100 transform scale-100"
                               x-transition:leave-end="opacity-0 transform scale-90">
                                Copied to clipboard.
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="grid xl:grid-cols-4 gap-4">
        <div class="grid xl:col-span-3 xl:grid-cols-2 gap-4">
            <div class="card xl:col-span-2">
                <div class="card-header flex justify-between items-center">
                    <h4 class="card-title">Booking Details</h4>
                    <div>
                        Booking #{{ $booking->id }}
                    </div>
                </div>

                <div class="px-6 py-2 space-y-2">
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

            <div class="card mb-4 h-full">
                <div class="card-header flex justify-between items-center">
                    <h4 class="card-title">
                        {{ $booking->route->departureAirportAll->name }}
                        - {{ $booking->route->departureAirportAll->identifiers }}
                    </h4>
                    <div>
                        Departure Airport
                    </div>
                </div>

                <div class="px-6 py-2 space-y-2">
                    <div class="grid sm:grid-cols-3 gap-3">
                        @if(!$this->airline->disable_stands)
                        <div class="col-span-1">
                            <p class="text-gray-400">Departure Stand</p>
                            <div class="gap-3 mt-1">
                                <h5 class="font-medium">
                                    {{ $this->booking->departureStand?->name ?? 'Any' }}
                                </h5>
                            </div>
                        </div>
                            <a href="{{ route('phoenix.resources.airport', ['airport' => $this->booking->route->departure_id]) }}"
                               class="col-span-2" target="_blank">
                                <div class="my-auto btn btn-sm btn-info-outline w-full">
                                    {{ $this->booking->route->departureAirportAll->identifier.' Information' }}
                                </div>
                            </a>
                        @else
                        <a href="{{ route('phoenix.resources.airport', ['airport' => $this->booking->route->departure_id]) }}"
                           class="col-span-3" target="_blank">
                            <div class="my-auto btn btn-sm btn-info-outline w-full">
                                {{ $this->booking->route->departureAirportAll->identifier.' Information' }}
                            </div>
                        </a>
                        @endif
                    </div>
                    <div class="grid sm:grid-cols-1 gap-3">
                        <div class="col-span-1">
                            <p class="text-gray-400">METAR</p>
                            <div class="gap-3 mt-1">
                                <h5 class="font-medium">
                                    {{ $this->metar->departure }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4 h-full">
                <div class="card-header flex justify-between items-center">
                    <h4 class="card-title">
                        {{ $booking->route->arrivalAirportAll->name }}
                        - {{ $booking->route->arrivalAirportAll->identifiers }}
                    </h4>
                    <div>
                        Arrival Airport
                    </div>
                </div>

                <div class="px-6 py-2 space-y-2">
                    <div class="grid sm:grid-cols-3 gap-3">
                        @if(!$this->airline->disable_stands)
                        <div class="col-span-1">
                            <p class="text-gray-400">Arrival Stand</p>
                            <div class="gap-3 mt-1">
                                <h5 class="font-medium">
                                    {{ $this->booking->arrivalStand?->name ?? 'Any' }}
                                </h5>
                            </div>
                        </div>
                            <a href="{{ route('phoenix.resources.airport', ['airport' => $this->booking->route->arrival_id]) }}"
                               class="col-span-2" target="_blank">
                                <div class="my-auto btn btn-sm btn-info-outline w-full">
                                    {{ $this->booking->route->arrivalAirportAll->identifier.' Information' }}
                                </div>
                            </a>
                        @else
                        <a href="{{ route('phoenix.resources.airport', ['airport' => $this->booking->route->arrival_id]) }}"
                           class="col-span-3" target="_blank">
                            <div class="my-auto btn btn-sm btn-info-outline w-full">
                                {{ $this->booking->route->arrivalAirportAll->identifier.' Information' }}
                            </div>
                        </a>
                            @endif
                    </div>
                    <div class="grid sm:grid-cols-1 gap-3">
                        <div class="col-span-1">
                            <p class="text-gray-400">METAR</p>
                            <div class="gap-3 mt-1">
                                <h5 class="font-medium">
                                    {{ $this->metar->arrival }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card h-full {{ $this->comparison->pireps->allTime->count == 0?'xl:col-span-2':'' }}">
                <div class="card-header flex justify-between items-center">
                    <h4 class="card-title">Flight Details</h4>
                    <div>
                        All times are Zulu
                    </div>
                </div>

                <div class="px-6 py-2 space-y-2">
                    <div class="grid sm:grid-cols-4 gap-3">
                        <div>
                            <div class="col-span-1">
                                <p class="text-gray-400">Scheduled Time</p>
                                <div class="gap-3">
                                    <h5 class="font-medium">{{ $booking->route->flight_length->format('H:i') }}</h5>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <p class="text-gray-400">Estimated Time</p>
                                <div class="gap-3">
                                    @if($booking->est_in && $booking->est_out)
                                        <h5 class="font-medium">{{ $booking->est_in->diff($booking->est_out)->format('%H:%i') }}</h5>
                                    @else
                                        <h5 class="font-medium">{{ $booking->route->flight_length->format('H:i') }}</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-span-1 sm:text-center">
                                <p class="text-gray-400">Route Departure</p>
                                <div class="gap-3">
                                    <h5 class="font-medium">{{ $booking->route->departure_time?$booking->route->departure_time->format('H:i'):$booking->departure_time->format('H:i') }}</h5>
                                </div>
                            </div>
                            <div class="col-span-1 sm:text-center">
                                <p class="text-gray-400">Route Arrival</p>
                                <div class="gap-3">
                                    <h5 class="font-medium">{{ $booking->route->arrival_time?$booking->route->departure_time->format('H:i'):$booking->arrival_time->format('H:i') }}</h5>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="col-span-1 sm:text-center">
                                <p class="text-gray-400">Booked Departure</p>
                                <div class="gap-3">
                                    <h5 class="font-medium">{{ $booking->departure_time->format('H:i') }}</h5>
                                </div>
                            </div>
                            <div class="col-span-1 sm:text-center">
                                <p class="text-gray-400">Booked Arrival</p>
                                <div class="gap-3">
                                    <h5 class="font-medium">{{ $booking->arrival_time->format('H:i') }}</h5>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="col-span-1 sm:text-right">
                                <p class="text-gray-400">Estimated Departure</p>
                                <div class="gap-3">
                                    @if($booking->est_in && $booking->est_out)
                                        <h5 class="font-medium">{{ $booking->est_out->format('H:i') }}</h5>
                                    @else
                                        <h5 class="font-medium">{{ $booking->departure_time->format('H:i') }}</h5>
                                    @endif
                                </div>
                            </div>
                            <div class="col-span-1 sm:text-right">
                                <p class="text-gray-400">Estimated Arrival</p>
                                <div class="gap-3">
                                    @if($booking->est_in && $booking->est_out)
                                        <h5 class="font-medium">{{ $booking->est_in->format('H:i') }}</h5>
                                    @else
                                        <h5 class="font-medium">{{ $booking->arrival_time->format('H:i') }}</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($this->comparison->pireps->allTime->count > 0)
                <div class="card h-full">
                    <div class="card-header flex justify-between items-center">
                        <h4 class="card-title">Compare</h4>
                        <div>
                            With {{ number_format($this->comparison->pireps->allTime->count) }}
                            other {{ \Illuminate\Support\Str::plural('flight', $this->comparison->pireps->allTime->count) }}
                            between {{ $this->booking->route->departureAirportAll->identifier }}
                            and {{ $this->booking->route->arrivalAirportAll->identifier }}
                        </div>
                    </div>

                    <div class="px-6 py-2 space-y-2">
                        <div class="grid sm:grid-cols-3 gap-3">
                            <div class="col-span-1">
                                <p class="text-gray-400">Landing Rate</p>
                                <div class="gap-3 mt-1">
                                    <h5 class="font-medium">{{ number_format($this->comparison->pireps->allTime->landingRate) }}
                                        FPM</h5>
                                </div>
                            </div>

                            <div class="col-span-1 sm:text-center">
                                <p class="text-gray-400">Fuel Used</p>
                                <div class=" gap-3 mt-1">
                                    <h5 class="font-medium">{{ number_format(convertWeightValue(divnum($this->comparison->pireps->allTime->fuelUsed, $this->comparison->pireps->allTime->count), $this->pilot)->value) }} {{ convertWeightValue(divnum($this->comparison->pireps->allTime->fuelUsed, $this->comparison->pireps->allTime->count), $this->pilot)->measure }}</h5>
                                </div>
                            </div>

                            <div class="col-span-1 sm:text-right">
                                <p class="text-gray-400">Flight Time</p>
                                <div class="gap-3 mt-1">
                                    <h5 class="font-medium">{{
                                        $this->comparison->pireps->allTime->count != 0
                                            ? sprintf(
                                                '%02d:%02d:%02d',
                                                ($this->comparison->flightTime->allTime->raw / $this->comparison->pireps->allTime->count / 3600),
                                                ($this->comparison->flightTime->allTime->raw / $this->comparison->pireps->allTime->count / 60 % 60),
                                                $this->comparison->flightTime->allTime->raw / $this->comparison->pireps->allTime->count % 60
                                            )
                                            : '00:00:00'
                                    }}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-3 gap-3">
                            <div class="col-span-1">
                                <p class="text-gray-400">Points</p>
                                <div class="gap-3 mt-1">
                                    <h5 class="font-medium">{{ number_format(divnum($this->comparison->points->allTime->sum, $this->comparison->pireps->allTime->count)) }}</h5>
                                </div>
                            </div>

                            <div class="col-span-1 sm:text-center">
                                <p class="text-gray-400">Passengers</p>
                                <div class=" gap-3 mt-1">
                                    <h5 class="font-medium">{{ number_format(divnum($this->comparison->transport->allTime->passengers, $this->comparison->pireps->allTime->count)) }}</h5>
                                </div>
                            </div>

                            <div class="col-span-1 sm:text-right">
                                <p class="text-gray-400">Freight</p>
                                <div class="gap-3 mt-1">
                                    <h5 class="font-medium">{{ number_format(convertWeightValue(divnum($this->comparison->transport->allTime->cargo, $this->comparison->pireps->allTime->count), $this->pilot)->value) }} {{ convertWeightValue(divnum($this->comparison->transport->allTime->cargo, $this->comparison->pireps->allTime->count), $this->pilot)->measure }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if($bookings->count() > 1)
                <div class="card xl:col-span-2">
                    <div class="card-header flex justify-between items-center">
                        <h4 class="card-title">Additional Bookings</h4>
                    </div>

                    <div class="space-y-2">
                        @foreach($bookings as $additionalBooking)
                            <div
                                @if($booking->id != $additionalBooking->id)
                                    wire:click="navigateToBooking({{ $additionalBooking->id }})"
                                @endif
                                class="px-6 py-2 grid sm:grid-cols-4 gap-3 hover:bg-gray-200 dark:hover:bg-gray-700 {{ $booking->id == $additionalBooking->id?'bg-gray-100 dark:bg-gray-600':'cursor-pointer' }}">
                                <div class="col-span-1">
                                    <p class="text-gray-400">Departure</p>
                                    <div class="gap-3 mt-1">
                                        <h5 class="font-medium">{{ $additionalBooking->route->departureAirportAll->name }}</h5>
                                        <h5 class="font-medium">{{ $additionalBooking->route->departureAirportAll->identifiers }}</h5>
                                    </div>
                                </div>

                                <div class="col-span-1 sm:text-center">
                                    <p class="text-gray-400">Arrival</p>
                                    <div class=" gap-3 mt-1">
                                        <h5 class="font-medium">{{ $additionalBooking->route->arrivalAirportAll->name }}</h5>
                                        <h5 class="font-medium">{{ $additionalBooking->route->arrivalAirportAll->identifiers }}</h5>
                                    </div>
                                </div>

                                <div class="col-span-1 sm:text-center">
                                    <p class="text-gray-400">Callsign & Flight Number</p>
                                    <div class="gap-3 mt-1">
                                        <h5 class="font-medium">{{ $additionalBooking->callsign }}</h5>
                                        <h5 class="font-medium">{{ $additionalBooking->flight_number }}</h5>
                                    </div>
                                </div>

                                <div class="col-span-1 sm:text-right">
                                    <p class="text-gray-400">Booked Departure</p>
                                    <div class="gap-3">
                                        <h5 class="font-medium">{{ $additionalBooking->departure_time->format('H:i') }}</h5>
                                    </div>
                                </div>
                            </div>

                            @if(!$loop->last)
                                <hr class="divider" />
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

        </div>

        <div class="col-span-1">
            <livewire:phoenix.flight-center.booking-page-sidebar :$ofpData :$booking />
        </div>
    </div>

    <x-filament-actions::modals />
</div>
