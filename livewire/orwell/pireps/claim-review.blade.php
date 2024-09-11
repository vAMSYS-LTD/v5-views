<div>
    <div class="grid grid-cols-2 gap-4">
        <div class="panel p-2">
            <div
                class="mb-2 flex items-start justify-between border-b border-[#e0e6ed] p-2 pt-0 dark:border-[#1b2e4b] dark:text-white-light">
                <h5 class="text-lg font-semibold">Claim Information</h5>
                <div class="dropdown mt-1">
                    Claim #{{ $claim->id }};
                </div>
            </div>
            <div class="px-2">
                <div class="space-y-2 divide-y divide-[#e0e6ed] dark:divide-[#1b2e4b]">
                    <div class="grid grid-cols-2">
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-base font-semibold tracking-wide">{{ $claim->departureAirport->name }}
                                | {{ $claim->departureAirport->identifiers }}</div>
                            <div class="text-sm">Departure Airport</div>
                        </div>
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-right text-base font-semibold tracking-wide">{{ $claim->departure_time->format('jS \o\f F, Y, H:i') }}</div>
                            <div class="text-sm text-right">Departure Time</div>
                        </div>
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-base font-semibold tracking-wide">{{ $claim->arrivalAirport->name }}
                                | {{ $claim->arrivalAirport->identifiers }}</div>
                            <div class="text-sm">Arrival Airport</div>
                        </div>
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-right text-base font-semibold tracking-wide">{{ $claim->arrival_time->format('jS \o\f F, Y, H:i') }}</div>
                            <div class="text-sm text-right">Arrival Time</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel p-2">
            <div
                class="mb-2 flex items-start justify-between border-b border-[#e0e6ed] p-2 pt-0 dark:border-[#1b2e4b] dark:text-white-light">
                <h5 class="text-lg font-semibold">Claimant Information</h5>
                <div class="dropdown mt-1">

                </div>
            </div>
            <div class="px-2">
                <div class="space-y-2 divide-y divide-[#e0e6ed] dark:divide-[#1b2e4b]">
                    <div class="grid grid-cols-2">
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-base font-semibold tracking-wide">{{ $claim->pilot->user->full_name }}</div>
                            <div class="text-sm">Pilot Name</div>
                        </div>
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-right text-base font-semibold tracking-wide">{{ $claim->pilot->username }}</div>
                            <div class="text-sm text-right">Pilot Username</div>
                        </div>
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-base font-semibold tracking-wide">{{ $claim->pilot->preferredRank->name }}</div>
                            <div class="text-sm">Rank</div>
                        </div>
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-right text-base font-semibold tracking-wide">{{ $claim->pilot->created_at->format('jS \o\f F, y') }}</div>
                            <div class="text-sm text-right">Pilot Registration Date</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel p-2 mt-4">
        <div
            class="mb-2 flex items-start justify-between border-b border-[#e0e6ed] p-2 pt-0 dark:border-[#1b2e4b] dark:text-white-light">
            <h5 class="text-lg font-semibold">Submitted Proof</h5>
            <div class="dropdown mt-1">

            </div>
        </div>
        <div class="px-2">
            <div class="space-y-2 divide-y divide-[#e0e6ed] dark:divide-[#1b2e4b]">
                <div class="grid grid-cols-5 gap-2">
                    @foreach($claim->proof as $item)
                        @if($item['type'] == 'image')
                            <a href="{{ Storage::disk('do_spaces')->url($item['data']['img']) }}" target="_blank"
                               class="flex p-2 flex-col align-content-center w-full border">
                                <div
                                    class="my-auto mx-auto text-base font-semibold tracking-wide underline hover:no-underline">
                                    <img src="{{ Storage::disk('do_spaces')->url($item['data']['img']) }}">
                                </div>
                            </a>
                        @endif
                        @if($item['type'] == 'link')
                            <a href="{{ $item['data']['url'] }}" target="_blank"
                               class="flex flex-col align-content-center w-full border p-2">
                                <div
                                    class="my-auto text-base font-semibold tracking-wide underline hover:no-underline">{{ $item['data']['url'] }}</div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @if($claim->message)
        <div class="panel p-2 mt-4">
            <div
                class="mb-2 flex items-start justify-between border-b border-[#e0e6ed] p-2 pt-0 dark:border-[#1b2e4b] dark:text-white-light">
                <h5 class="text-lg font-semibold">Message</h5>
                <div class="dropdown mt-1">

                </div>
            </div>
            <div class="px-2">
                <div class="flex flex-col align-content-center">
                    <div>{{ $claim->message }}</div>
                </div>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-2 gap-4 mt-4">
        <div class="panel p-2">
            <div
                class="mb-2 flex items-start justify-between border-b border-[#e0e6ed] p-2 pt-0 dark:border-[#1b2e4b] dark:text-white-light">
                <h5 class="text-lg font-semibold">Computed Information</h5>
                <div class="dropdown mt-1">

                </div>
            </div>
            <div class="px-2">
                <div class="space-y-2 divide-y divide-[#e0e6ed] dark:divide-[#1b2e4b]">
                    <div class="grid grid-cols-3">
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-base font-semibold tracking-wide">{{ $estimatedTime }}</div>
                            <div class="text-sm">Claimed Time</div>
                        </div>
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-center text-base font-semibold tracking-wide">
                                @if($claim->booking_id)
                                    {{ $routeAverageTime }}
                                @else
                                    N/A
                                @endif
                            </div>
                            <div class="text-sm text-center">Average Time for Route</div>
                        </div>
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-base text-right font-semibold tracking-wide">
                                @if($claim->booking_id)
                                    {{ number_format($routeAveragePoints) }}
                                @else
                                    N/A
                                @endif
                            </div>
                            <div class="text-sm text-right">Average Points for Route</div>
                        </div>
                    </div>
                </div>
                <div class="space-y-2 divide-y divide-[#e0e6ed] dark:divide-[#1b2e4b]">
                    <div class="grid grid-cols-3">
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-base font-semibold tracking-wide"></div>
                            <div class="text-sm"></div>
                        </div>
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-center text-base font-semibold tracking-wide">{{ $pairAverageTime }}</div>
                            <div class="text-sm text-center">Average Time for Airport Pair</div>
                        </div>
                        <div class="flex flex-col align-content-center">
                            <div
                                class="my-auto text-base text-right font-semibold tracking-wide">{{ number_format($pairAveragePoints) }}</div>
                            <div class="text-sm text-right">Average Points for Airport Pair</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel p-2">
            <div
                class="mb-2 flex items-start justify-between border-b border-[#e0e6ed] p-2 pt-0 dark:border-[#1b2e4b] dark:text-white-light">
                <h5 class="text-lg font-semibold">Claim Review</h5>
                <div class="dropdown mt-1">

                </div>
            </div>
            <div class="px-2">
                {{ $this->form }}
            </div>
        </div>
    </div>

</div>
