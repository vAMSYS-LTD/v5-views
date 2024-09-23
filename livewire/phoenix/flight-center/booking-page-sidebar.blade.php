<div>
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">
                Booking Actions
            </h4>
        </div>

        <div class="px-6 py-2 space-y-2 flex flex-col pb-4">
            @if($ofpData && in_array($booking->network, ['VATSIM', 'IVAO', 'PilotEdge', 'POSCON']))
                <a href="{{ str_replace('SIMBRIEF', $this->airline->online_remark, $ofpData->prefile->{strtolower($booking->network)}->link) }}"
                   target="_blank">
                    <div class="btn btn-sm btn-info-outline w-full">
                        Send to {{ $booking->network }}
                    </div>
                </a>
            @endif
            @if($airline->use_fr24_button)
                <a href="{{ 'https://www.flightradar24.com/data/flights/'.($airline->fr24_callsign_override == null ? $booking->flight_number : $airline->fr24_callsign_override . substr($booking->flight_number, 2)) }}"
                   target="_blank">
                    <div class="btn btn-sm btn-info-outline w-full">
                        Flightradar24
                    </div>
                </a>
            @endif
            @if($airline->use_radarbox_button)
                <a href="{{ 'https://www.radarbox.com/data/flights/'. $booking->callsign }}"
                   target="_blank">
                    <div class="btn btn-sm btn-info-outline w-full">
                        RadarBox
                    </div>
                </a>
            @endif


            <a href="{{ route('phoenix.flight-centre.book') }}">
                <div class="btn btn-sm btn-info-outline w-full">
                    Make Additional Booking
                </div>
            </a>
            @if($this->booking->simbrief_ofp_id == null)
                {{ $this->simbriefAction }}
            @endif

            <div wire:loading.attr="disabled" wire:click="mountAction('simbriefImport')"
                 class="btn btn-sm btn-info-outline w-full cursor-pointer">
                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                     class="animate-spin fi-btn-icon transition duration-75 h-5 w-5 text-white"
                     wire:loading.delay.default="" wire:target="mountAction('simbriefImport')">
                    <path clip-rule="evenodd"
                          d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                          fill-rule="evenodd" fill="currentColor" opacity="0.2"></path>
                    <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor"></path>
                </svg>
                <span>
                    Import From SimBrief
                </span>
            </div>

            @if($airline->enable_claims_system)
                {{ $this->claimAction }}
            @endif

            {{ $this->cancelBookingAction }}
            @if($this->booking->redispatchable)
                {{ $this->cancelAndRebookAction }}
            @endif
        </div>
    </div>
    @if($ofpData)
        <div class="card mt-4">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">
                    SimBrief Actions
                </h4>
            </div>

            <div class="px-6 py-2 space-y-2 flex flex-col pb-4">
                <a href="{{ $ofpData->files->directory }}{{ $ofpData->files->pdf->link }}" target="_blank">
                    <div class="btn btn-sm btn-info-outline w-full">
                        Open OFP
                    </div>
                </a>
                <a href="https://dispatch.simbrief.com/briefing/{{ $ofpData->params->request_id }}" target="_blank">
                    <div class="btn btn-sm btn-info-outline w-full">
                        Open In SimBrief
                    </div>
                </a>
                <livewire:phoenix.flight-center.components.sim-brief-downloads-component :$ofpData lazy />
            </div>
        </div>
    @endif
    @include('livewire.phoenix.flight-center.components.sbapiform')

    <x-filament-actions::modals />
</div>
@push('scripts')
    <script src="/assets/simbrief/simbrief.js"></script>
    @script
    <script>
        $wire.on('send_to_sb', (event) => {
            let bookingId = event.bookingId;
            simbriefsubmit('/phoenix/flight-center/booking/' + bookingId);
        });
    </script>
    @endscript
@endpush


