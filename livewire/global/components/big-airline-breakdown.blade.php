<div class="columns-1 lg:columns-2 gap-4 mb-4">
    @foreach($airlines as $airline)
        <div class="break-inside-avoid card group hover:bg-gray-200 dark:hover:bg-gray-700 mb-4">
            <div wire:click="login({{ $airline['id'] }}, 'phoenix')" class="cursor-pointer pt-5 pr-5 pl-5 grid grid-cols-6">
                <div class="col-span-6 xl:col-span-3">
                    <div class="">
                        <img class="w-full aspect-[9/2]" x-show="!darkMode" src="{{ $airline['logo_bright'] }}">
                        <img class="w-full aspect-[9/2]" x-show="darkMode" src="{{ $airline['logo_dark'] }}">
                    </div>
                    <div class="text-center">
                        @if($airline['slogan'])
                            {{ $airline['slogan'] }}
                        @else
                            &nbsp;
                        @endif
                    </div>
                </div>
                <div class="relative col-span-3 hidden xl:block md:ml-5 md:h-full ">
                    @if($teamvAMSYS)
                        <div class="absolute right-0 top-0">
                            {{ $airline['prefix'].$airline['id'] }}
                        </div>
                    @endif
                    <div class="grid grid-cols-4 text-center h-full gap-4 content-evenly">
                        <div>
                            <div class="text-xl font-bold">{{ number_format($airline['statistics']->data->pireps->allTime->count ) }}</div>
                            <div class="text-md font-semibold">PIREPs</div>
                        </div>
                        <div class="col-span-2">
                            <div
                                class="text-xl font-bold">{{ $airline['statistics']->data->flightTime->allTime->formatted }}</div>
                            <div class="text-md font-semibold">Time</div>
                        </div>
                        <div>
                            <div
                                class="text-xl font-bold">{{ number_format($airline['statistics']->data->points->allTime->sum) }}</div>
                            <div class="text-md font-semibold">Points</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-6 mt-5">
                <div class="grid grid-cols-6">
                    <div class="col-span-6 xl:col-span-3">
                        <div class="flex flex-grow-0">
                            @if(!$airline['pilot_vds'] && !$airline['pilot_orwell'])
                                <button wire:click="login({{ $airline['id'] }}, 'phoenix')" type="button" class="btn bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 border-secondary rounded-none rounded-bl-md rounded-tr-md w-full">
                                    {{ $airline['pilot_username'] }}
                                </button>
                            @else
                                <button wire:click="login({{ $airline['id'] }}, 'phoenix')" type="button" class="btn bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 border-secondary border-r-0 rounded-none rounded-bl-md w-full">
                                    {{ $airline['pilot_username'] }}
                                </button>
                            @endif

                            @if($airline['pilot_vds'] && !$airline['pilot_orwell'])
                                    <button wire:click="login({{ $airline['id'] }},'vds')" type="button" class="btn bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 border-secondary border-l-0 rounded-none rounded-tr-lg w-full">VDS
                                    </button>
                            @elseif($airline['pilot_vds'])
                                    <button wire:click="login({{ $airline['id'] }},'vds')" type="button" class="btn bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 border-secondary border-x-0 rounded-none w-full">VDS
                                    </button>
                            @endif

                            @if($airline['pilot_orwell'])
                                <button wire:click="login({{ $airline['id'] }},'orwell')" type="button" class="btn bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 border-secondary border-l-0 rounded-none rounded-tr-lg w-full">Orwell
                                </button>
                            @endif
                        </div>
                    </div>
                    <div wire:click="login({{ $airline['id'] }}, 'phoenix')" class="cursor-pointer col-span-3 hidden xl:block md:h-full bg-white dark:bg-gray-800 group-hover:bg-gray-200 dark:group-hover:bg-gray-700 rounded-br-lg">
                        <div class="flex h-full justify-center items-center text-md font-semibold">
                            @if($airline['pilot_last_pirep_date'])
                                Last PIREP: {{ $airline['pilot_last_pirep_date'] }}
                            @else

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
