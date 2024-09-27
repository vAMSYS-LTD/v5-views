@php
    use Carbon\Carbon;
    $widthCount = [
            'block_full' => [
                'full' => 'grid-cols-5',
                '66' => 'grid-cols-4',
                '50' => 'grid-cols-3',
                '33' => 'grid-cols-1',
            ],
            'block_half' => [
                'full' => 'grid-cols-2',
                '66' => 'grid-cols-2',
                '50' => 'grid-cols-1',
                '33' => 'grid-cols-1',
            ],
            'block_third' => [
                'full' => 'grid-cols-1',
                '66' => 'grid-cols-1',
                '50' => 'grid-cols-1',
                '33' => 'grid-cols-1',
            ],
            'block_two_thirds' => [
                'full' => 'grid-cols-3',
                '66' => 'grid-cols-2',
                '50' => 'grid-cols-1',
                '33' => 'grid-cols-1',
            ],
        ];
@endphp
<div wire:key="dashboard.boxes" class="{{ $componentWidth }}" style="{{ (($firstBooking && $bookingCount >= 0) || ($pireps && (count($pireps) > 0))) ? '' : 'display: contents'}}">
    <div class="grid gap-2 {{ $widthCount[$block][$width] }}">
        @if($firstBooking && $bookingCount >= 0)
            <div wire:key="booking" wire:click="navigateBooking" class="card card-info dashboard-card-booking cursor-pointer">
                <div class="px-2 pt-2">
                    <div class="flex justify-between">
                        <div class="grow overflow-hidden">
                            <div class="flex justify-between dashboard-card-header">
                                <h5 class="text-base/3 font-normal mt-0">
                                    {{ $firstBooking->callsign }}
                                    <i class="mx-2 fa-duotone fa-pipe"></i>
                                    {{ $firstBooking->flight_number }}
                                    @if($bookingCount > 0)
                                        <i class="mx-2 fa-duotone fa-pipe"></i> +{{ $bookingCount }} more
                                    @endif
                                </h5>
                                <span class="my-auto text-xs">Booking</span>
                            </div>
                            <div class="w-full justify-around grid grid-cols-3 text-center mt-2 dashboard-card-content">
                                <div class="cursor-pointer"
                                     @mouseenter="$popovers('{{ $firstBooking->route->departureAirportAll->name }}')"
                                     data-trigger="mouseenter">
                                    @if($firstBooking->departure_stand_id)
                                        {{ $firstBooking->route->departureAirportAll->icao }} - {{ $firstBooking->departureStand->name }}
                                    @else
                                        {{ $firstBooking->route->departureAirportAll->icao }}
                                    @endif
                                </div>
                                <div>
                                    <i class="fa-duotone fa-right"></i>
                                </div>
                                <div class="cursor-pointer"
                                     @mouseenter="$popovers('{{ $firstBooking->route->arrivalAirportAll->name }}')"
                                     data-trigger="mouseenter">
                                    @if($firstBooking->departure_stand_id)
                                        {{ $firstBooking->route->arrivalAirportAll->icao }} - {{ $firstBooking->arrivalStand?->name }}
                                    @else
                                        {{ $firstBooking->route->arrivalAirportAll->icao }}
                                    @endif
                                </div>
                                <div>
                                    @if($firstBooking->departure_timestamp)
                                        {{ $firstBooking->departure_timestamp->format('H:i') }}
                                    @else
                                        {{ Carbon::parse($firstBooking->departure_time)->format('H:i') }}
                                    @endif
                                </div>
                                <div class="cursor-pointer" @mouseenter="$popovers('{{ $firstBooking->aircraft->type->code }}')"
                                     data-trigger="mouseenter">
                                    {{ $firstBooking->aircraft->registration }}
                                </div>
                                <div>
                                    @if($firstBooking->arrival_timestamp)
                                        {{ $firstBooking->arrival_timestamp->format('H:i') }}
                                    @else
                                        {{ Carbon::parse($firstBooking->arrival_time)->format('H:i') }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($pireps)
            @foreach($pireps as $pirep)
                @php
                    $panelClass = '';
                    $buttonClass = '';
                    $badgeClass = '';
                    switch ($pirep->status) {
                        case 'accepted':
                        case 'complete':
                            $panelClass = 'card card-success dashboard-card-pirep-complete';
                            $badgeClass = 'my-auto text-xs dashboard-card-pirep-complete-badge';
                            break;
                        case 'rejected':
                        case 'invalidated':
                            $panelClass = 'card card-warning dashboard-card-pirep-rejected';
                            $badgeClass = 'my-auto text-xs dashboard-card-pirep-rejected-badge';
                            break;
                       default:
                            $panelClass = 'card card-danger dashboard-card-pirep-other';
                            $badgeClass = 'my-auto text-xs dashboard-card-pirep-other-badge';
                    }
                    if ($pirep->need_reply){
                        $panelClass = 'card card-primary dashboard-card-pirep-needreply';
                        $badgeClass = 'my-auto text-xs dashboard-card-pirep-needreply-badge';
                    }
                @endphp
                    <div wire:key="{{ $pirep->id }}" wire:click="navigatePirep({{$pirep->id}})" class="{{ $panelClass }} cursor-pointer">
                        <div class="px-2 pt-2">
                            <div class="flex justify-between">
                                <div class="grow overflow-hidden">
                                    <div class="flex justify-between dashboard-card-header">
                                        <h5 class="text-base/3 font-normal mt-0">
                                            PIREP
                                            #{{ $pirep->id }} <i
                                                class="mx-2 fa-duotone fa-pipe"></i> {{ $pirep->booking->callsign }}
                                        </h5>
                                        <span class="{{ $badgeClass }}">{{ $pirep->humanStatus }}</span>
                                    </div>
                                    <div class="w-full justify-around grid grid-cols-3 text-center mt-2 dashboard-card-content">
                                        <div class="cursor-pointer"
                                             @mouseenter="$popovers('{{ $pirep->route?->departureAirportAll->name }}')"
                                             data-trigger="mouseenter">
                                            {{ $pirep->route?->departureAirportAll->icao }}
                                        </div>
                                        <div>
                                            <i class="fa-duotone fa-right"></i>
                                        </div>
                                        <div class="cursor-pointer"
                                             @mouseenter="$popovers('{{ $pirep->route?->arrivalAirportAll->name }}')"
                                             data-trigger="mouseenter">
                                            {{ $pirep->route?->arrivalAirportAll->icao }}
                                        </div>

                                        <div class="cursor-pointer" @mouseenter="$popovers('Flight Length')" data-trigger="mouseenter">
                                            {{ $pirep->flight_length_human }}
                                        </div>
                                        <div class="cursor-pointer"
                                             @mouseenter="$popovers('Points: {{ $pirep->points }}; Bonus: {{ $pirep->bonus_sum }}')"
                                             data-trigger="mouseenter">
                                            {{ $pirep->points + $pirep->bonus_sum }}
                                        </div>
                                        <div class="cursor-pointer" @mouseenter="$popovers('Landing Rate')" data-trigger="mouseenter">
                                            {{ $pirep->landing_rate }} FPM
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        @endif
    </div>
</div>
