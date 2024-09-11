<div>
    <div class="grid grid-cols-4 gap-4">
        <div class="col-span-3" x-data="{tab: 'allTime'}" x-init="$nextTick(() => { tab = @this.selectTab })">
            <!-- buttons -->
            <div>
                <ul class="flex flex-wrap mb-2 rounded-md justify-between bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
                    <li class="grow-0 rounded-l-md px-2 py-3 flex justify-center"
                        @mouseenter="$popovers('Last Updated: {{ \Carbon\Carbon::parse($data->generatedAt)->format('jS M, H:i') }}z')"
                        data-trigger="mouseenter">
                        Statistics:
                    </li>
                    <li class="flex-grow">
                        <a href="javascript:"
                           class="p-2 py-3 flex flex-grow justify-center border-transparent border-t-2 dark:hover:bg-[#191e3a] hover:border-secondary hover:text-secondary"
                           :class="{'!border-secondary text-secondary dark:bg-[#191e3a]' : tab === 'today'}"
                           @click="tab = 'today'">
                            {{ \Carbon\Carbon::now()->format('jS M') }}
                        </a>
                    </li>
                    <li class="flex-grow">
                        <a href="javascript:"
                           class="p-2 py-3 flex flex-grow justify-center border-transparent border-t-2 dark:hover:bg-[#191e3a] hover:border-secondary hover:text-secondary"
                           :class="{'!border-secondary text-secondary dark:bg-[#191e3a]' : tab === 'last24'}"
                           @click="tab = 'last24'">
                            24 Hrs
                        </a>
                    </li>
                    <li class="flex-grow">
                        <a href="javascript:"
                           class="p-2 py-3 flex flex-grow justify-center border-transparent border-t-2 dark:hover:bg-[#191e3a] hover:border-secondary hover:text-secondary"
                           :class="{'!border-secondary text-secondary dark:bg-[#191e3a]' : tab === 'yesterday'}"
                           @click="tab = 'yesterday'">
                            {{ \Carbon\Carbon::now()->subDay()->format('jS M') }}
                        </a>
                    </li>
                    <li class="flex-grow">
                        <a href="javascript:"
                           class="p-2 py-3 flex flex-grow justify-center border-transparent border-t-2 dark:hover:bg-[#191e3a] hover:border-secondary hover:text-secondary"
                           :class="{'!border-secondary text-secondary dark:bg-[#191e3a]' : tab === 'thirty'}"
                           @click="tab = 'thirty'">
                            30 Days
                        </a>
                    </li>
                    <li class="flex-grow">
                        <a href="javascript:"
                           class="p-2 py-3 flex flex-grow justify-center border-transparent border-t-2 dark:hover:bg-[#191e3a] hover:border-secondary hover:text-secondary"
                           :class="{'!border-secondary text-secondary dark:bg-[#191e3a]' : tab === 'yearToDate'}"
                           @click="tab = 'yearToDate'">
                            Year to Date
                        </a>
                    </li>
                    <li class="flex-grow">
                        <a href="javascript:"
                           class="p-2 py-3 flex flex-grow justify-center border-transparent border-t-2 dark:hover:bg-[#191e3a] hover:border-secondary hover:text-secondary"
                           :class="{'!border-secondary text-secondary dark:bg-[#191e3a]' : tab === 'lastYear'}"
                           @click="tab = 'lastYear'">
                            Last Year
                        </a>
                    </li>
                    <li class="flex-grow border-r-2 border-secondary">
                        <a href="javascript:"
                           class="p-2 py-3 flex flex-grow justify-center border-transparent border-t-2 dark:hover:bg-[#191e3a] hover:border-secondary hover:text-secondary"
                           :class="{'!border-secondary text-secondary dark:bg-[#191e3a]' : tab === 'allTime'}"
                           @click="tab = 'allTime'">
                            All Time
                        </a>
                    </li>
                </ul>
            </div>

            <!-- description -->
            <div class="flex-1 text-sm">
                @php
                    $times = ['today', 'last24', 'yesterday', 'thirty', 'yearToDate', 'lastYear', 'allTime'];
                @endphp

                @foreach($times as $item)
                    <template x-if="tab === '{{ $item }}'">
                        <div class="grid @if($selection == 'ranks') grid-cols-5 @else grid-cols-3 @endif gap-2">
                            <div
                                class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-2">
                                <div class="flex justify-between">
                                    <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">PIREPs</h6>
                                    <span class="text-xs my-auto">Last Updated: {{ \Carbon\Carbon::parse($data->generatedAt)->format('jS M, H:i') }}z</span>
                                </div>
                                {{--                            <div class="text-xs mb-2"></div>--}}
                                <div class="flex items-center justify-start -space-x-3 rtl:space-x-reverse mt-2">
                                    <div class="flex w-full gap-2">
                                        <div @mouseenter="$popovers('Complete/Accepted')" data-trigger="mouseenter"
                                             class="font-bold text-xl text-success mx-auto">{{ number_format($data->pireps->$item->accepted) }}</div>
                                        <div @mouseenter="$popovers('Rejected')" data-trigger="mouseenter"
                                             class="font-bold text-xl text-warning mx-auto">{{ number_format($data->pireps->$item->rejected) }}</div>
                                        <div @mouseenter="$popovers('Invalidated')" data-trigger="mouseenter"
                                             class="font-bold text-xl text-danger mx-auto">{{ number_format($data->pireps->$item->invalidated) }}</div>
                                        <div @mouseenter="$popovers('Manual')" data-trigger="mouseenter"
                                             class="font-bold text-xl text-primary mx-auto">{{ number_format($data->pireps->$item->manual) }}</div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-2">
                                <div class="flex justify-between">
                                    <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Points</h6>
                                    <span class="text-xs my-auto">~{{ number_format(divnum($data->points->$item->sum, $data->pireps->$item->accepted)) }}
                                per flight</span>
                                </div>
                                {{--                            <div class="text-xs mb-2"></div>--}}
                                <div class="flex items-center my-auto -space-x-3 rtl:space-x-reverse mt-2">
                                    <div class="flex w-full gap-2">
                                        <div @mouseenter="$popovers('Regular Points')" data-trigger="mouseenter"
                                             class="font-bold text-xl text-primary mx-auto">{{ number_format($data->points->$item->regular) }}</div>
                                        <div @mouseenter="$popovers('Bonus Points')" data-trigger="mouseenter"
                                             class="font-bold text-xl text-success mx-auto">{{ number_format($data->points->$item->bonus) }}</div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-2">
                                <div class="flex justify-between">
                                    <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Time &
                                        Distance</h6>
                                    <span class="text-xs my-auto">~{{ number_format(divnum($data->pireps->$item->distanceFlown, $data->pireps->$item->accepted + $data->pireps->$item->rejected)) }}
                                NM per flight</span>
                                </div>
                                {{--                            <div class="text-xs mb-2"></div>--}}
                                <div class="flex items-center justify-start -space-x-3 rtl:space-x-reverse mt-2">
                                    <div class="flex w-full gap-2">
                                        <div
                                            class="font-bold text-xl text-primary mx-auto">{{ $data->flightTime->$item->formatted }}</div>
                                        <div
                                            class="font-bold text-xl text-primary mx-auto">{{ number_format($data->pireps->$item->distanceFlown) }}
                                            NM
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-2">
                                <div class="flex justify-between">
                                    <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Passengers
                                        & Freight</h6>
                                    <span class="text-xs my-auto">~{{ number_format(divnum($data->transport->$item->passengers,$data->pireps->$item->accepted + $data->pireps->$item->rejected)) }}
                                /{{ number_format(divnum($data->transport->$item->cargo, $data->pireps->$item->accepted + $data->pireps->$item->rejected)) }}
                                per flight</span>
                                </div>
                                {{--                            <div class="text-xs mb-2"></div>--}}
                                <div class="flex items-center justify-start -space-x-3 rtl:space-x-reverse mt-2">
                                    <div class="flex w-full gap-2">
                                        <div class="flex w-full gap-2">
                                            <div
                                                class="font-bold text-xl text-primary mx-auto">{{ number_format($data->transport->$item->passengers) }}</div>
                                            <div
                                                class="font-bold text-xl text-primary mx-auto">{{ number_format(convertWeightValue($data->transport->$item->cargo, auth()->user())->value) }} {{ convertWeightValue($data->transport->$item->cargo, auth()->user())->measure }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-2">
                                <div class="flex justify-between">
                                    <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Fuel
                                        Used</h6>
                                    <span class="text-xs my-auto"> ~{{ number_format(divnum($data->pireps->$item->fuelUsed, $data->pireps->$item->accepted + $data->pireps->$item->rejected)) }}
                                per flight</span>
                                </div>
                                {{--                            <div class="text-xs mb-2"></div>--}}
                                <div class="flex items-center justify-start -space-x-3 rtl:space-x-reverse mt-2">
                                    <div class="flex w-full gap-2">
                                        <div
                                            class="font-bold text-xl text-primary mx-auto">{{ number_format(convertWeightValue($data->pireps->$item->fuelUsed, auth()->user())->value) }} {{ convertWeightValue($data->pireps->$item->fuelUsed, auth()->user())->measure }}</div>
                                    </div>
                                </div>
                            </div>
                            @if($selection != 'ranks')
                                <div
                                    class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-2">
                                    <div class="flex justify-between">
                                        <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">
                                            Airports Visited</h6>
                                    </div>
                                    <div class="flex items-center justify-start -space-x-3 rtl:space-x-reverse mt-2">
                                        <div
                                            class="font-bold text-xl mx-auto">{{ number_format($uniqueAirports) }}</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </template>
                @endforeach
            </div>
        </div>

        <div class="col-span-1">
            <div
                class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-2">
                <div class="flex items-center justify-start -space-x-3 rtl:space-x-reverse">
                    <div class="flex flex-col w-full gap-2">
                        <div class="font-bold text-xl text-primary mx-auto">
                            {{ $publicName }}
                        </div>
                        <div class="font-bold text-xl text-primary mx-auto">
                            {{ $username }}
                        </div>

                        <div class="font-bold text-xl text-primary mx-auto">
                            <img class="max-h-10 mx-auto" src="{{ $rank->display_image }}"
                                 alt="{{ $rank->name }}">
                        </div>
                        <div class="font-bold text-md mx-auto">
                            {{ $rank->name }}
                        </div>

                    </div>
                </div>
            </div>
            @if(($youtube || $twitch) && $showSocial)
                <div
                    class="w-full mt-2 bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-2">
                    <div class="flex items-center justify-start -space-x-3 rtl:space-x-reverse mt-2">
                        <div class="flex justify-around w-full gap-2">
                            @if($youtube)
                                <div class="font-bold h-8 w-8 text-xl text-[#FF0000]">
                                    <a href=https://www.youtube.com/{{ $youtube }}"></a> <x-icon name="brands.youtube" />
                                </div>
                            @endif
                            @if($twitch)
                                <div class="font-bold h-8 w-8 text-xl text-[#9146FF]">
                                    <a href="https://www.twitch.tv/{{ $twitch }}" target="_blank"><x-icon name="brands.twitch" /></a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>
