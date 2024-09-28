<div>
    @if($flights)
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h3 class="card-title">{{ count((array)$flights->flights) }} Live {{ Str::plural('Flight', count((array)$flights->flights)) }}</h3>
                <div class="flex justify-between">
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
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($flights->flights as $flight)
                                <tr id="flight-{{ $flight->bookingId }}">
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
                                            {{ \Carbon\Carbon::parse($flight->progress->departureTime)->format('H:i') }}
                                        </td>
                                    @else
                                        <td class="hidden lg:table-cell"
                                            @mouseenter="$popovers('Departure Time: {{ \Carbon\Carbon::parse($flight->progress->departureTime)->format('H:i') }}')"
                                            data-trigger="mouseenter">
                                            {{ $flight->progress->timeRemaining }}
                                        </td>
                                    @endif
                                    <td class="hidden lg:table-cell">{{ $flight->progress->distanceRemaining }}</td>
                                    <td class="">{{ $flight->progress->currentPhase }}</td>
                                    <td class="">{{ $flight->booking->network }}</td>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    @endif
</div>
