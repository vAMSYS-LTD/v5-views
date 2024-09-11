<div>
    <div class="mb-4" x-data="{tab: 'today'}">
        <!-- buttons -->
        <div>
            <ul class="flex flex-wrap mb-2">
                <li>
                    <a href="javascript:" class="p-7 py-3 flex items-center bg-[#f6f7f8] dark:bg-transparent border-transparent border-t-2 dark:hover:bg-[#191e3a] hover:border-secondary hover:text-secondary"
                       :class="{'!border-secondary text-secondary dark:bg-[#191e3a]' : tab === 'today'}" @click="tab = 'today'">
                        Today
                    </a>
                </li>
                <li>
                    <a href="javascript:" class="p-7 py-3 flex items-center bg-[#f6f7f8] dark:bg-transparent dark:hover:bg-[#191e3a] border-transparent border-t-2  hover:border-secondary hover:text-secondary"
                       :class="{'!border-secondary text-secondary dark:bg-[#191e3a]' : tab === 'last24'}" @click="tab = 'last24'">
                        24 Hrs
                    </a>
                </li>
                <li>
                    <a href="javascript:" class="p-7 py-3 flex items-center bg-[#f6f7f8] dark:bg-transparent dark:hover:bg-[#191e3a] border-transparent border-t-2  hover:border-secondary hover:text-secondary"
                       :class="{'!border-secondary text-secondary dark:bg-[#191e3a]' : tab === 'yesterday'}" @click="tab = 'yesterday'">
                        Yesterday
                    </a>
                </li>
                <li>
                    <a href="javascript:" class="p-7 py-3 flex items-center bg-[#f6f7f8] dark:bg-transparent dark:hover:bg-[#191e3a] border-transparent border-t-2 hover:border-secondary hover:text-secondary"
                       :class="{'!border-secondary text-secondary dark:bg-[#191e3a]' : tab === 'thirty'}" @click="tab = 'thirty'">
                        30 Days
                    </a>
                </li>
                <li>
                    <a href="javascript:" class="p-7 py-3 flex items-center bg-[#f6f7f8] dark:bg-transparent dark:hover:bg-[#191e3a] border-transparent border-t-2 hover:border-secondary hover:text-secondary"
                       :class="{'!border-secondary text-secondary dark:bg-[#191e3a]' : tab === 'yearToDate'}" @click="tab = 'yearToDate'">
                        Year to Date
                    </a>
                </li>
                <li>
                    <a href="javascript:" class="p-7 py-3 flex items-center bg-[#f6f7f8] dark:bg-transparent dark:hover:bg-[#191e3a] border-transparent border-t-2 hover:border-secondary hover:text-secondary"
                       :class="{'!border-secondary text-secondary dark:bg-[#191e3a]' : tab === 'lastYear'}" @click="tab = 'lastYear'">
                        Last Year
                    </a>
                </li>
                <li>
                    <a href="javascript:" class="p-7 py-3 flex items-center bg-[#f6f7f8] dark:bg-transparent dark:hover:bg-[#191e3a] border-transparent border-t-2 hover:border-secondary hover:text-secondary"
                       :class="{'!border-secondary text-secondary dark:bg-[#191e3a]' : tab === 'allTime'}" @click="tab = 'allTime'">
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
                    <div class="grid grid-cols-4 gap-4">
                        <div class="max-w-[24rem] bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                            <div class="flex justify-between mb-2">
                                <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Pilots</h6>
                                <span class="text-xs my-auto">Aggregate of {{ $airlineCount }} VAs</span>
                            </div>
                            <div class="flex items-center justify-start -space-x-3 rtl:space-x-reverse">
                                <div class="flex w-full gap-4">
                                    <div @mouseenter="$popovers('Registrations')" data-trigger="mouseenter" class="font-bold text-xl text-success mx-auto">{{ number_format($data->pilots->$item->new) }}</div>
                                    <div @mouseenter="$popovers('Deletions')" data-trigger="mouseenter" class="font-bold text-xl text-danger mx-auto">{{ number_format(-$data->pilots->$item->deleted) }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                            <div class="flex justify-between mb-2">
                                <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">PIREPs</h6>
                                <span class="text-xs my-auto"></span>
                            </div>
                            <div class="items-center justify-start -space-x-3 rtl:space-x-reverse">
                                <div class="flex flex-wrap w-full gap-4">
                                    <div @mouseenter="$popovers('Complete/Accepted')" data-trigger="mouseenter" class="font-bold text-xl text-success mx-auto">{{ number_format($data->pireps->$item->accepted) }}</div>
                                    <div @mouseenter="$popovers('Rejected')" data-trigger="mouseenter" class="font-bold text-xl text-warning mx-auto">{{ number_format($data->pireps->$item->rejected) }}</div>
                                    <div @mouseenter="$popovers('Invalidated')" data-trigger="mouseenter" class="font-bold text-xl text-danger mx-auto">{{ number_format($data->pireps->$item->invalidated) }}</div>
                                    <div @mouseenter="$popovers('Manual')" data-trigger="mouseenter" class="font-bold text-xl text-primary mx-auto">{{ number_format($data->pireps->$item->manual) }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                            <div class="flex justify-between mb-2">
                                <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Points</h6>
                                <span class="text-xs my-auto">~{{ number_format(divnum($data->points->$item->regular + $data->points->$item->bonus , $data->pireps->$item->accepted)) }} per flight</span>
                            </div>
                            <div class="flex items-center justify-start -space-x-3 rtl:space-x-reverse">
                                <div class="flex flex-wrap w-full gap-4">
                                    <div @mouseenter="$popovers('Regular Points')" data-trigger="mouseenter" class="font-bold text-xl text-primary mx-auto">{{ number_format($data->points->$item->regular) }}</div>
                                    <div @mouseenter="$popovers('Bonus Points')" data-trigger="mouseenter" class="font-bold text-xl text-success mx-auto">{{ number_format($data->points->$item->bonus) }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                            <div class="flex justify-between mb-2">
                                <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Flight Time</h6>
                                <span class="text-xs my-auto"> </span>
                            </div>
                            <div class="flex items-center justify-start -space-x-3 rtl:space-x-reverse">
                                <div class="flex w-full gap-4">
                                    <div class="font-bold text-xl text-primary mx-auto">{{ $data->flightTime->$item->formatted }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                            <div class="flex justify-between mb-2">
                                <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Passengers</h6>
                                <span class="text-xs my-auto">~{{ number_format(divnum($data->transport->$item->passengers,$data->pireps->$item->accepted + $data->pireps->$item->rejected)) }} per flight</span>
                            </div>
                            <div class="flex items-center justify-start -space-x-3 rtl:space-x-reverse">
                                <div class="flex w-full gap-4">
                                    <div class="font-bold text-xl text-primary mx-auto">{{ number_format($data->transport->$item->passengers) }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                            <div class="flex justify-between mb-2">
                                <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Cargo</h6>
                                <span class="text-xs my-auto">~{{ number_format(divnum($data->transport->$item->cargo, $data->pireps->$item->accepted + $data->pireps->$item->rejected)) }} per flight</span>
                            </div>
                            <div class="flex items-center justify-start -space-x-3 rtl:space-x-reverse">
                                <div class="flex w-full gap-4">
                                    <div class="font-bold text-xl text-primary mx-auto">{{ number_format(convertWeightValue($data->transport->$item->cargo, auth()->user())->value) }} {{ convertWeightValue($data->transport->$item->cargo, auth()->user())->measure }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                            <div class="flex justify-between mb-2">
                                <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Fuel Used</h6>
                                <span class="text-xs my-auto">~{{ number_format(divnum($data->pireps->$item->fuelUsed, $data->pireps->$item->accepted + $data->pireps->$item->rejected)) }} per flight</span>
                            </div>
                            <div class="flex items-center justify-start -space-x-3 rtl:space-x-reverse">
                                <div class="flex w-full gap-4">
                                    <div class="font-bold text-xl text-primary mx-auto">{{ number_format(convertWeightValue($data->pireps->$item->fuelUsed, auth()->user())->value) }} {{ convertWeightValue($data->pireps->$item->fuelUsed, auth()->user())->measure }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                            <div class="flex justify-between mb-2">
                                <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Distance Flown</h6>
                                <span class="text-xs my-auto">~{{ number_format(divnum($data->pireps->$item->distanceFlown, $data->pireps->$item->accepted + $data->pireps->$item->rejected)) }} per flight</span>
                            </div>
                            <div class="flex items-center justify-start -space-x-3 rtl:space-x-reverse">
                                <div class="flex w-full gap-4">
                                    <div class="font-bold text-xl text-primary mx-auto">{{ number_format($data->pireps->$item->distanceFlown) }}NM</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            @endforeach
        </div>
    </div>
</div>
