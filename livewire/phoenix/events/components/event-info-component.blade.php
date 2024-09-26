<div class="flex flex-col space-y-4">
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">Event Information</h4>
        </div>
        <div class="px-6 py-2 space-y-2">
            <div class="grid sm:grid-cols-2 gap-2">
                <div class="col-span-1">
                    <p class="text-gray-400">Event Start</p>
                    <div class="gap-3">
                        <h5 class="font-medium">{{ $event->event_starts_at->format('jS \o\f F H:i') }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-right">
                    <p class="text-gray-400">Event End</p>
                    <div class="gap-3">
                        <h5 class="font-medium">{{ $event->event_ends_at->format('jS \o\f F H:i') }}</h5>
                    </div>
                </div>
            </div>
            @if($event->registration_required)
                <div class="grid sm:grid-cols-2 gap-2">
                    <div class="col-span-1">
                        <p class="text-gray-400">Registations Start</p>
                        <div class="gap-3">
                            <h5 class="font-medium">{{ $event->open_registrations_at->format('jS \o\f F H:i') }}</h5>
                        </div>
                    </div>

                    <div class="col-span-1 sm:text-right">
                        <p class="text-gray-400">Registrations End</p>
                        <div class="gap-3">
                            <h5 class="font-medium">{{ $event->close_registrations_at->format('jS \o\f F H:i') }}</h5>
                        </div>
                    </div>
                </div>
            @endif
            <div class="grid sm:grid-cols-3 gap-2">
                <div class="col-span-1">
                    <p class="text-gray-400">Points</p>
                    <div class="gap-3">
                        <h5 class="font-medium">{{ $event->points }}</h5>
                        @if($event->subtype == 'tour' && $event->tour_points)
                            <h5 class="font-medium">For completed Tour</h5>
                        @elseif($event->subtype == 'tour' && !$event->tour_points)
                            <h5 class="font-medium">For each completed leg</h5>
                        @endif
                    </div>
                </div>

                <div class="col-span-2 sm:text-right">
                    <p class="text-gray-400">Point Award Conditions</p>
                    <div>
                        @if($event->subtype == 'tour' && $event->legs_route)
                            Fly the routes in sequence specified
                        @elseif($event->subtype == 'tour' && $event->legs_airport)
                            Fly between airports in sequence specified
                        @else
                            @switch($event->type)
                                @case(1)
                                    @if($event->routes)
                                        Fly the {{ \Illuminate\Support\Str::plural('route', count(explode(',', $event->routes))) }} specified
                                    @else
                                        Fly between Airports in direction specified
                                    @endif
                                    @break

                                @case(2)
                                    Land at the Event Airport
                                    @break
                                @case(3)
                                    Depart from the Event Airport
                                    @break
                                @case(4)
                                    Fly to or from Event Airport
                                    @break
                                @case(5)
                                    Fly from Any Airport
                                    @break
                            @endswitch
                        @endif
                    </div>
                    <div>
                        @switch($event->type)
                            @case(1)
                                Depart during Event Time
                                @break

                            @case(2)
                                Land during Event Time
                                @break

                            @case(3)
                                Depart and Land during Event Time
                                @break

                            @case(4)
                                Depart or Land during Event Time
                                @break
                        @endswitch
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header flex justify-between items-center">
            @if($eventAirports)
                <h4 class="card-title">Event {{ \Illuminate\Support\Str::plural('Airport', $eventAirports->count()) }}</h4>
            @endif
            @if($eventRoutes)
                <h4 class="card-title">Event {{ \Illuminate\Support\Str::plural('Route', $eventRoutes->count()) }}</h4>
            @endif
        </div>
     
        <div class="px-6 py-2 space-y-2">
            <div class="grid sm:grid-cols-2 gap-2">
                @if($event->type == 1 && $eventAirports)
                    <div class="col-span-1">
                        <p class="text-gray-400">Departure {{ Str::plural('Airport', count($departures)) }}</p>

                        <div class="flex flex-col justify-end">
                            @foreach($eventAirports as $airport)
                                @if(in_array($airport->id, $departures))
                                    <div class="flex justify-start">
                                        <x-dynamic-component class="h-5 w-5 ml-2 my-auto"
                                                             component="flag-country-{{ strtolower($airport->worldAirport->country->code) }}" />
                                        <a href="{{ route('phoenix.resources.airport', ['airport' => $airport]) }}" target="_blank" class="font-medium ml-2" @mouseenter="$popovers('{{ addslashes($airport->identifiers) }}')"
                                              data-trigger="mouseenter">
                                            {{ $airport->name }}
                                        </a>

                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-span-1">
                        <p class="text-gray-400 text-right">Arrival {{ Str::plural('Airport', count($arrivals)) }}</p>

                        <div class="flex flex-col justify-end">
                            @foreach($eventAirports as $airport)
                                @if(in_array($airport->id, $arrivals))
                                    <div class="flex justify-end">
                                        <a href="{{ route('phoenix.resources.airport', ['airport' => $airport]) }}" target="_blank" class="font-medium" @mouseenter="$popovers('{{ addslashes($airport->identifiers) }}')"
                                              data-trigger="mouseenter">
                                            {{ $airport->name }}
                                        </a>
                                        <x-dynamic-component class="h-5 w-5 ml-2 my-auto"
                                                             component="flag-country-{{ strtolower($airport->worldAirport->country->code) }}" />
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($event->type == 1 && $eventRoutes)
                    @foreach($eventRoutes as $route)
                        <div class="col-span-1">
                            <p class="text-gray-400">Callsign</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ $route->callsign  }}</h5>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <p class="text-gray-400 text-right">Flight Number</p>
                            <div class="gap-3 text-right">
                                <h5 class="font-medium">{{ $route->flight_number }}</h5>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <p class="text-gray-400">Departure</p>
                            <div class="gap-3">
                                <h5 class="font-medium flex" @mouseenter="$popovers('{{ addslashes($route->departureAirport->identifiers) }}')"
                                    data-trigger="mouseenter">
                                    <x-dynamic-component class="h-5 w-5 mr-2 my-auto"
                                                         component="flag-country-{{ strtolower($route->departureAirport->worldAirport->country->code) }}" />
                                    {{ $route->departureAirport->name }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <p class="text-gray-400 text-right">Arrival</p>
                            <div class="gap-3 text-right">
                                <h5 class="font-medium flex justify-end" @mouseenter="$popovers('{{ addslashes($route->arrivalAirport->identifiers) }}')"
                                    data-trigger="mouseenter">
                                    {{$route->arrivalAirport->name }}
                                    <x-dynamic-component class="h-5 w-5 ml-2 my-auto"
                                                         component="flag-country-{{ strtolower($route->arrivalAirport->worldAirport->country->code) }}" />
                                </h5>
                            </div>
                        </div>

                        @if(!$loop->last)
                            <hr class="divider" />
                        @endif
                    @endforeach
                @endif

                @if($event->type == 1 && $legsAirport)
                    @foreach($legsAirport as $leg)
                        <div class="col-span-2">
                            <p class="text-gray-400">Leg</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ $loop->iteration }}</h5>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <p class="text-gray-400">Departure</p>
                            <div class="gap-3">
                                <h5 class="font-medium flex" @mouseenter="$popovers('{{ addslashes($leg->departure->identifiers) }}')"
                                    data-trigger="mouseenter">
                                    <x-dynamic-component class="h-5 w-5 mr-2 my-auto"
                                                         component="flag-country-{{ strtolower($leg->departure->worldAirport->country->code) }}" />
                                    {{ $leg->departure->name }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <p class="text-gray-400 text-right">Arrival</p>
                            <div class="gap-3 text-right">
                                <h5 class="font-medium flex justify-end" @mouseenter="$popovers('{{ addslashes($leg->arrival->identifiers) }}')"
                                    data-trigger="mouseenter">
                                    {{$leg->arrival->name }}
                                    <x-dynamic-component class="h-5 w-5 ml-2 my-auto"
                                                         component="flag-country-{{ strtolower($leg->arrival->worldAirport->country->code) }}" />
                                </h5>
                            </div>
                        </div>

                        @if(!$loop->last)
                            <hr class="divider" />
                        @endif
                    @endforeach
                @endif

                @if($event->type != 1)
                    @foreach($eventAirports as $airport)
                        <div class="flex">
                            <x-dynamic-component class="h-5 w-5 my-auto"
                                                 component="flag-country-{{ strtolower($airport->worldAirport->country->code) }}" />
                            <a href="{{ route('phoenix.resources.airport', ['airport' => $airport]) }}" target="_blank" class="font-medium ml-2" @mouseenter="$popovers('{{ addslashes($airport->identifiers) }}')"
                               data-trigger="mouseenter">
                                {{ $airport->name }}
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @if($otherAirports)
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Airports of Interest</h4>
            </div>
            <div class="px-6 py-2 space-y-2">
                <div class="grid sm:grid-cols-2 gap-x-4">
                    @foreach($otherAirports as $airport)
                        <div
                            @if($loop->odd)
                            class="flex justify-start"
                            @else
                            class="flex justify-end"
                            @endif
                        >
                            @if($loop->odd)
                                <x-dynamic-component class="h-5 w-5 my-auto"
                                                     component="flag-country-{{ strtolower($airport->worldAirport->country->code) }}" />
                                <a href="{{ route('phoenix.resources.airport', ['airport' => $airport]) }}" target="_blank" class="font-medium ml-2" @mouseenter="$popovers('{{ addslashes($airport->identifiers) }}')"
                                   data-trigger="mouseenter">
                                    {{ $airport->name }}
                                </a>
                            @else
                                <a href="{{ route('phoenix.resources.airport', ['airport' => $airport]) }}" target="_blank" class="font-medium" @mouseenter="$popovers('{{ addslashes($airport->identifiers) }}')"
                                   data-trigger="mouseenter">
                                    {{ $airport->name }}
                                </a>
                                <x-dynamic-component class="h-5 w-5 ml-2 my-auto"
                                                     component="flag-country-{{ strtolower($airport->worldAirport->country->code) }}" />
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if($networks || $fleet || $ranks || $callsigns)
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Event Restrictions</h4>
            </div>
            <div class="px-6 py-2 flex flex-col space-y-2">
                @if($networks)
                    <div class="flex justify-between">
                        <p class="text-gray-400">Network Restriction</p>
                        <div class="flex flex-col text-right justify-end">
                            @foreach($networks as $network)
                                <h5 class="font-medium">
                                    @switch($network)
                                        @case('offline')
                                            Offline
                                            @break
                                        @case('vatsim')
                                            VATSIM
                                            @break
                                        @case('ivao')
                                            IVAO
                                            @break
                                        @case('poscon')
                                            POSCON
                                            @break
                                        @case('pilotedge')
                                            PilotEdge
                                            @break
                                        @default
                                            Network Name Not Found.
                                    @endswitch
                                </h5>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($fleet)
                    <div class="flex justify-between">
                        <p class="text-gray-400">Fleet Restriction</p>
                        <div class="flex flex-col text-right justify-end">
                            @foreach($fleet as $type)
                                <h5 class="font-medium">{{ $type->name }} | {{ $type->code }}</h5>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($ranks)
                    <div class="flex justify-between">
                        <p class="text-gray-400">Rank Restriction</p>
                        <div class="flex flex-col text-right justify-end">
                            @foreach($ranks as $rank)
                                <h5 class="font-medium">{{ $rank->name }}</h5>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($callsigns)
                    <div class="flex justify-between">
                        <p class="text-gray-400">Callsign Restriction</p>
                        <div class="flex flex-col text-right justify-end">
                            @foreach($callsigns as $callsign)
                                <h5 class="font-medium">{{ $callsign->icao_code }} | {{ $callsign->iata_code }}</h5>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif

    @if($event->registration_required)
        <livewire:phoenix.events.registration :event="$event" />
    @endif
</div>
