<div class="panel p-0 h-full @if(!$notices) mt-4 mb-5 @endif">
    <div class="px-5 pt-2 mb-2 flex items-center dark:text-white-light">
        <div class="flex flex-row justify-between content-center w-full">
            <!-- Flight List Phoenix 4 -->
            <h5 class="font-semibold text-md">{{ $flights->total }} Live {{ Str::plural('Flight', $flights->total) }}</h5>
            <div class="text-xs">
                Updated: {{ \Carbon\Carbon::parse($flights->generatedAt)->format('H:i') }}z
            </div>
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
                    <th class="hidden sm:table-cell"></th>
                </tr>
                </thead>
                <tbody class="">
                @foreach($flights->flights as $flight)
                    <tr id="flight-{{ $flight->bookingId }}">
                        <td class="cursor-pointer" @mouseenter="$popovers('{{ $flight->pilot->username }} - {{ $flight->pilot->rank->name }}')"
                            data-trigger="mouseenter">
                            {{ $flight->user->name }}, {{ $flight->pilot->rank->abbreviation }}
                        </td>
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

                        <td class="hidden sm:table-cell">
                            <a href="{{ route('phoenix.flight-centre.map', ['booking' => $flight->bookingId]) }}" class="cursor-pointer" @mouseenter="$popovers('View on Map')"
                               data-trigger="mouseenter"><i class="fa-duotone fa-map-location"></i></a>
                            <a href="{{ route('phoenix.profile.pilot', ['airlineIdentifier' => $flight->pilot->airline, 'pilotUsername' => $flight->pilot->username]) }}" target="_blank" class="cursor-pointer" @mouseenter="$popovers('View Profile')"
                               data-trigger="mouseenter"><i class="fa-duotone fa-user"></i></a>
{{--                            <a href="/" class="cursor-pointer" @mouseenter="$popovers('View PIREPs')"--}}
{{--                               data-trigger="mouseenter"><i class="fa-duotone fa-ticket-airline"></i></a>--}}
                        </td>
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
@script
<script>
    ['livewire:navigated'].forEach(function(e) {
        let highlightedFlight;

        Livewire.on('flight-map-selected-marker', ({ bookingId }) => {
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
