<div class="w-full grid gap-2">
    @if($event->registration_required || ($networks || $fleet || $ranks || $callsigns))
        <div class="grid xl:grid-cols-3 gap-4">
            <div class="xl:col-span-3 flex flex-col space-y-2">
                @if($event->registration_required)
                    <div class="alert alert-info" role="alert">
                        <span class="font-bold">Registration required!</span> - If you want to participate in the event and earn the bonus points, you must register prior to starting your flight.
                    </div>
                @endif

                @if($networks || $fleet || $ranks || $callsigns)
                    <div class="alert alert-info" role="alert">
                        <span class="font-bold">Event Restrictions!</span> - This event has some restrictions. Be sure to read 'Event Restrictions' section to ensure you earn the bonus points for your participation.
                    </div>
                @endif
            </div>
        </div>
    @endif

    <div class="grid xl:grid-cols-5 gap-4">
        <div class="grid xl:col-span-3 gap-2 content-start">
            <div class="relative card">
                @if($event->tag)
                    <span class="absolute top-0 right-0 dark:bg-primary bg-primary badge badge-primary text-white dark:text-white">{{ $event->tag }}</span>
                @endif
                <img class="rounded shadow w-full" src="{{ $event->event_image }}" />
            </div>
            <div class="card">
                <div class="card-header flex justify-between items-center">
                    <h4 class="card-title">{{ $event->name }}</h4>
                    @if($event->tag)
                        <div>{{ $event->tag }}</div>
                    @endif
                </div>
                <div class="px-6 py-2 space-y-2 event-description">
                    {!! $event->description !!}
                </div>
            </div>
            @if($event->registration_required && $event->registrations->count() > 0)
                <div class="card">
                    <div class="card-header flex justify-between items-center">
                        <h4 class="card-title">Registrations</h4>
                    </div>
                    <div class="px-6 py-2 flex flex-col space-y-2">
                        @foreach($event->registrations->pluck('network')->unique() as $network)
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
                            <div class="grid grid-cols-4">
                                @foreach($event->registrations->where('network', '=', $network) as $registration)
                                    <div
                                        @if($registration->pilot_id == $pilot->id)
                                            class="font-medium"
                                        @endif
                                    >
                                       {{ $registration->pilot->username }} - {{ $registration->pilot->user->public_name }}
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        <div class="xl:col-span-2">
            <livewire:phoenix.events.components.event-info-component :$event :$networks :$fleet :$ranks :$callsigns :$eventAirports :$eventRoutes :$departures :$arrivals :$legsAirport :$legsRoute :$otherAirports />
        </div>
    </div>
</div>

