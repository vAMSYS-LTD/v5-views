<div class="grid sm:grid-cols-2 gap-4 content-start">
    <div class="grid gap-4 sm:col-span-2">
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">{{ $airport->name }}</h4>
                <div>
                    {{ $airport->icao }} | {{ $airport->iata }} {{ $airport->category?' || '. $airport->category: '' }}
                </div>
            </div>
        </div>
    </div>
    @if($information || $briefing || $standGroups->count() > 0)
    <div class="grid gap-4 content-start">
        @if($briefing)
            <div class="card tiptap-editor">
                <div class="card-header flex justify-between items-center">
                    <h4 class="card-title">Airport Briefing</h4>
                </div>
                <div class="tiptap ProseMirror px-6 py-2 space-y-2 striped-table">
                    {!! $briefing !!}
                </div>
            </div>
        @endif

        @if($information)
            <div class="card tiptap-editor">
                <div class="card-header flex justify-between items-center">
                    <h4 class="card-title">Airport Information</h4>
                </div>
                <div class="tiptap ProseMirror px-6 py-2 space-y-2 striped-table">
                    {!! $information !!}
                </div>
            </div>
        @endif
        @if($standGroups->count() > 0)
                <div class="card">
                    <div class="card-header flex justify-between items-center">
                        <h4 class="card-title">Stand Groups</h4>
                    </div>
                    <div class="px-6 py-2 space-y-2">
                        @foreach($standGroups as $group)
                            <div class="font-bold">
                                {{ $group->name }} Stands/Gates:
                            </div>
                            <div>
                                <div class="grid grid-cols-6">
                                    @foreach($group->stands as $stand)
                                        <div>
                                            {{ $stand->name }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        @endif
        @if(\App\Models\Airport\Scenery::query()->whereAirlineId($this->airline->id)->whereAirportId($this->airport->id)->count() > 0)
            <div>
                {{ $this->table }}
            </div>
        @endif
    </div>
    @endif
    <div class="grid gap-4 content-start">
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Weather</h4>
            </div>
            <div class="px-6 py-2 space-y-2 flex">
                <div class="grow">
                    {{ $currentMetar }}
                </div>
                <div class="flex-none">
                    <a href="https://metar-taf.com/{{ $airport->icao?$airport->icao:$airport->iata }}" class="w-full hover:no-underline"
                       target="_blank">
                        <div class="flex align-items-center mr-auto">
                            <img src="https://metar-taf.com/images/windsock.svg" height="40" width="40"
                                 alt="METAR &amp; TAF Visual decoder">
                            <div class="ml-2 text-left">
                                <h1 class="h5 mb-0 text-ellipsis text-uppercase">Metar &amp; Taf</h1>
                                <h2 class="subtitle mb-0 text-ellipsis">Visual decoder</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Online ATC Network Maps</h4>
            </div>
            <div class="px-6 py-2 space-y-2 grid grid-cols-2">
                <div class="flex-grow my-auto">
                    <a href="https://vatsim-radar.com/airport/{{ $airport->icao }}" target="_blank">VATSIM</a>
                </div>
                <div class="flex-grow my-auto">
                    <a href="https://webeye.ivao.aero/?airportId={{ $airport->icao }}" target="_blank">IVAO</a>
                </div>
                <div class="flex-grow my-auto">
                    <a href="https://hq.poscon.net/map" target="_blank"> POSCON</a>
                </div>
                <div class="flex-grow my-auto">
                    <a href="http://map.pilotedge.net/map/" target="_blank">PilotEdge</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Destinations</h4>
            </div>
            <div class="px-6 py-2 space-y-2">
                <div class="grid sm:grid-cols-2 gap-x-4">
                    @foreach($destinationAirports as $airport)
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
    </div>


</div>
