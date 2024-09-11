<div>
    @if($flights)
        <div class="grid xl:grid-cols-1 gap-4 mb-4">
            <div class="panel p-0 h-full">
                <div class="px-5 pt-2 mb-2 flex justify-between items-center dark:text-white-light">
                    <h5 class="font-semibold text-md">{{ count((array)$flights->flights) }} Live {{ Str::plural('Flight', count((array)$flights->flights)) }}</h5>
                    <div class="flex justify-between">
                        <div class="text-sm my-auto"></div>
                    </div>
                </div>
                <div class="relative sticky-header">
                    <div class="bg-white dark:bg-dark-dark rounded-b-md table-responsive max-h-[354px]">
                        <table class="table-striped text-center">
                            <thead>
                            <tr>
                                <th>Pilot</th>
                                <th class="hidden sm:table-cell">Callsign</th>
                                <th class="hidden md:table-cell">Departure</th>
                                <th class="hidden md:table-cell">Arrival</th>
                                <th class="hidden xl:table-cell">Aircraft</th>
                                <th class="hidden lg:table-cell">ETE/ETD</th>
                                <th class="hidden lg:table-cell">Distance</th>
                                <th>Status</th>
                                <th>Network</th>
{{--                                <th class="hidden sm:table-cell"></th>--}}
                            </tr>
                            </thead>
                            <tbody class="">
                            @foreach($flights->flights as $flight)
                                <tr>
                                    <td class="cursor-pointer" @mouseenter="$popovers('{{ $flight->pilot->username }}')"
                                        data-trigger="mouseenter">{{ $flight->user->name }}</td>
                                    <td class="cursor-pointer hidden sm:table-cell" @mouseenter="$popovers('{{ $flight->booking->flightNumber }}')"
                                        data-trigger="mouseenter">{{ $flight->booking->callsign }}
                                    </td>
                                    <td class="cursor-pointer hidden md:table-cell" @mouseenter="$popovers('{{ addslashes($flight->departureAirport->name) }}')"
                                        data-trigger="mouseenter">{{ $flight->departureAirport->icao?:$flight->departureAirport->iata }}
                                    </td>
                                    <td class="cursor-pointer hidden md:table-cell" @mouseenter="$popovers('{{ addslashes($flight->arrivalAirport->name) }}')"
                                        data-trigger="mouseenter">{{ $flight->arrivalAirport->icao?:$flight->arrivalAirport->iata }}
                                    </td>
                                    <td class="hidden xl:table-cell">{{ $flight->aircraft->name }} - {{ $flight->aircraft->registration }}</td>
                                    @if($flight->phase < 4)
                                        <td class="cursor-pointer hidden lg:table-cell" @mouseenter="$popovers('Scheduled Departure Time')" data-trigger="mouseenter">
                                            {{ \Carbon\Carbon::parse($flight->progress->departureTime)->format('H:i') }}
                                        </td>
                                    @else
                                        <td class="cursor-pointer hidden lg:table-cell" @mouseenter="$popovers('Departure Time: {{ \Carbon\Carbon::parse($flight->progress->departureTime)->format('H:i') }}')" data-trigger="mouseenter">
                                            {{ $flight->progress->timeRemaining }}
                                        </td>
                                    @endif
                                    <td class="hidden lg:table-cell">{{ $flight->progress->distanceRemaining }}</td>
                                    <td class="">{{ $flight->progress->currentPhase }}</td>
                                    <td class="">{{ $flight->booking->network }}</td>
{{--                                    <td class="hidden sm:table-cell">--}}
{{--                                        <a href="/" class="cursor-pointer" @mouseenter="$popovers('View on Map')"--}}
{{--                                           data-trigger="mouseenter"><i class="fa-duotone fa-map-location"></i></a>--}}
{{--                                        <a href="/" class="cursor-pointer" @mouseenter="$popovers('View Profile')"--}}
{{--                                           data-trigger="mouseenter"><i class="fa-duotone fa-user"></i></a>--}}
{{--                                        <a href="/" class="cursor-pointer" @mouseenter="$popovers('View PIREPs')"--}}
{{--                                           data-trigger="mouseenter"><i class="fa-duotone fa-ticket-airline"></i></a>--}}
{{--                                    </td>--}}
                                </tr>
                                <tr>
                                    <td colspan="10" class="p-0">
                                        <div class="w-full h-1 bg-[#ebedf2] dark:bg-dark/40 rounded-full flex">
                                            <div class="bg-success h-1 text-center text-white text-xs" style="width: {{ 100 - (divnum($flight->progress->distanceRemaining, $flight->progress->routeDistance)) * 100 }}%"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>