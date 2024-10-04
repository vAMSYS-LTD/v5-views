@php use Carbon\Carbon; @endphp
<div wire:poll.600s="refreshData" class="{{ $componentWidth }}">
    @if($flights)
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h3 class="card-title">{{ $flights->total }} Live {{ Str::plural('Flight', $flights->total) }}</h3>
                <div class="flex justify-between">
                    <div class="my-auto text-sm">Updated: {{ Carbon::parse($flights->generatedAt)->format('H:i') }}z
                    </div>
                    <button
                        @mouseenter="$popovers('List automatically updates every 10 minutes. Click to trigger an update.')"
                        data-trigger="mouseenter" wire:click="refreshData" wire:loading.attr="disabled"
                        wire:loading.class.remove=""
                        class="ml-4 btn btn-sm border-primary text-primary hover:bg-primary hover:text-white">
                        <span wire:loading.remove>Update</span>
                        <span wire:loading>Updating</span>
                    </button>
                </div>
            </div>


            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="overflow-hidden striped-table">
                        <table>
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
                                <th class="hidden sm:table-cell"></th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @if($flights->total == 0)
                                <tr class="">
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200 text-center" colspan="10">No Flights in Progress</td>
                                </tr>
                            @endif
                            @foreach($flights->flights as $flight)
                                <tr id="flight-{{ $flight->bookingId }}"
                                    class="@if($selectedFlight == $flight->bookingId) font-bold @endif">
                                    <td class=""
                                        @mouseenter="$popovers('{{ $flight->pilot->username }} - {{ $flight->pilot->rank->name }}')"
                                        data-trigger="mouseenter">{{ $flight->user->name }}, {{ $flight->pilot->rank->abbreviation }}</td>
                                    <td class="hidden  sm:table-cell"
                                        @mouseenter="$popovers('{{ $flight->booking->flightNumber }}')"
                                        data-trigger="mouseenter">{{ $flight->booking->callsign }}
                                    </td>
                                    <td class="hidden  md:table-cell"
                                        @mouseenter="$popovers('{{ addslashes($flight->departureAirport->name) }}')"
                                        data-trigger="mouseenter">{{ $flight->departureAirport->icao?:$flight->departureAirport->iata }}
                                    </td>
                                    <td class="hidden md:table-cell"
                                        @mouseenter="$popovers('{{ addslashes($flight->arrivalAirport->name) }}')"
                                        data-trigger="mouseenter">{{ $flight->arrivalAirport->icao?:$flight->arrivalAirport->iata }}
                                    </td>
                                    <td class="hidden xl:table-cell">{{ $flight->aircraft->name }} - {{ $flight->aircraft->registration }}</td>
                                    @if($flight->phase < 4)
                                        <td class="hidden lg:table-cell"
                                            @mouseenter="$popovers('Scheduled Departure Time')" data-trigger="mouseenter">
                                            {{ Carbon::parse($flight->progress->departureTime)->format('H:i') }}
                                        </td>
                                    @else
                                        <td class="hidden lg:table-cell"
                                            @mouseenter="$popovers('Departure Time: {{ Carbon::parse($flight->progress->departureTime)->format('H:i') }}')"
                                            data-trigger="mouseenter">
                                            {{ $flight->progress->timeRemaining }}
                                        </td>
                                    @endif
                                    <td class="hidden lg:table-cell">{{ $flight->progress->distanceRemaining }}</td>
                                    <td class="">{{ $flight->progress->currentPhase }}</td>
                                    <td class="">{{ $flight->booking->network }}</td>
                                    <td class="hidden sm:table-cell">
                                        <a href="{{ route('phoenix.flight-centre.map', ['booking' => $flight->bookingId]) }}"
                                           target="_blank" class="" @mouseenter="$popovers('View on Map')"
                                           data-trigger="mouseenter"><i class="fa-duotone fa-map-location"></i></a>
                                        @if($flight->pilot->username != 'Anonymous')
                                            <a href="{{ route('phoenix.profile.pilot', ['airlineIdentifier' => $flight->pilot->airline, 'pilotUsername' => $flight->pilot->username]) }}"
                                               target="_blank" class="" @mouseenter="$popovers('View Profile')"
                                               data-trigger="mouseenter"><i class="fa-duotone fa-user"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="10" class="!p-0">
                                        <div class="w-full h-1 bg-[#ebedf2] dark:bg-dark/40 rounded-full flex">
                                            <div class="h-1 text-xs text-center text-white bg-success"
                                                 style="width: {{ 100 - (divnum($flight->progress->distanceRemaining, $flight->progress->routeDistance)) * 100 }}%"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            @foreach($pastFlights as $pastFlight)
                                <tr id="flight-{{ $pastFlight->bookingId }}">
                                    <td class=""
                                        @mouseenter="$popovers('{{ $pastFlight->pilot->username }} - {{ $pastFlight->pilot->rank->name }}')"
                                        data-trigger="mouseenter">{{ $pastFlight->pilot->user->public_name }}, {{ $pastFlight->pilot->rank->abbreviation }}</td>
                                    <td class="hidden  sm:table-cell"
                                        @mouseenter="$popovers('{{ $pastFlight->booking->flight_number }}')"
                                        data-trigger="mouseenter">{{ $pastFlight->booking->callsign }}
                                    </td>
                                    <td class="hidden  md:table-cell"
                                        @mouseenter="$popovers('{{ addslashes($pastFlight->route->departureAirportAll->name) }}')"
                                        data-trigger="mouseenter">{{ $pastFlight->route->departureAirportAll->icao?:$pastFlight->route->departureAirportAll->iata }}
                                    </td>
                                    <td class="hidden md:table-cell"
                                        @mouseenter="$popovers('{{ addslashes($pastFlight->route->arrivalAirportAll->name) }}')"
                                        data-trigger="mouseenter">{{ $pastFlight->route->arrivalAirportAll->icao?:$pastFlight->route->arrivalAirportAll->iata }}
                                    </td>
                                    <td class="hidden xl:table-cell">{{ $pastFlight->booking->aircraft->name }} - {{ $pastFlight->booking->aircraft->registration }}</td>

                                    <td class="hidden lg:table-cell">

                                    </td>

                                    <td class="hidden lg:table-cell"></td>
                                    <td class="">Landed {{ $pastFlight->created_at->format('H:i') }}</td>
                                    <td class="">{{ $pastFlight->booking->network }}</td>
                                    <td class="hidden sm:table-cell">

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
@script
<script>
    ['livewire:navigated'].forEach(function (e) {
        let highlightedFlight;

        Livewire.on('flight-map-selected-marker', ({bookingId}) => {
            const flightRow = document.getElementById(`flight-${bookingId}`);

            if (flightRow) { // Check if flightRow is not null
                if (highlightedFlight) {
                    highlightedFlight.classList.remove('highlight-class');
                }

                highlightedFlight = flightRow;
                flightRow.classList.add('highlight-class');
                flightRow.scrollIntoView();
            }
        });
    });
</script>
@endscript
